<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCarRegistrationRequest;
use App\Http\Requests\StoreCarRegistrationRequest;
use App\Http\Requests\UpdateCarRegistrationRequest;
use App\Models\CarRegistration;
use App\Models\City;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Retailer;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
// use Illuminate\Support\Facades\Mail;
use Mail;
use PDF;

class CarRegistrationController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('car_registration_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carRegistrations = CarRegistration::with(['city', 'product_name', 'product_size', 'retailer', 'media'])->get();

        return view('admin.carRegistrations.index', compact('carRegistrations'));
    }

    public function create()
    {
        abort_if(Gate::denies('car_registration_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cities = City::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product_names = Product::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product_sizes = ProductSize::all()->pluck('size', 'id')->prepend(trans('global.pleaseSelect'), '');

        $retailers = Retailer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.carRegistrations.create', compact('cities', 'product_names', 'product_sizes', 'retailers'));
    }

    public function store(StoreCarRegistrationRequest $request)
    {
        $carRegistration = CarRegistration::create($request->all());

        if ($request->input('invoice_attachment', false)) {
            $carRegistration->addMedia(storage_path('tmp/uploads/' . basename($request->input('invoice_attachment'))))->toMediaCollection('invoice_attachment');
        }

        foreach ($request->input('photos', []) as $file) {
            $carRegistration->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $carRegistration->id]);
        }

        return redirect()->route('admin.car-registrations.index');
    }

    public function edit(CarRegistration $carRegistration)
    {
        abort_if(Gate::denies('car_registration_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cities = City::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product_names = Product::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product_sizes = ProductSize::all()->pluck('size', 'id')->prepend(trans('global.pleaseSelect'), '');

        $retailers = Retailer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $carRegistration->load('city', 'product_name', 'product_size', 'retailer');

        return view('admin.carRegistrations.edit', compact('cities', 'product_names', 'product_sizes', 'retailers', 'carRegistration'));
    }

    public function update(UpdateCarRegistrationRequest $request, CarRegistration $carRegistration)
    {
        $carRegistration->update($request->all());

        if ($request->input('invoice_attachment', false)) {
            if (!$carRegistration->invoice_attachment || $request->input('invoice_attachment') !== $carRegistration->invoice_attachment->file_name) {
                if ($carRegistration->invoice_attachment) {
                    $carRegistration->invoice_attachment->delete();
                }
                $carRegistration->addMedia(storage_path('tmp/uploads/' . basename($request->input('invoice_attachment'))))->toMediaCollection('invoice_attachment');
            }
        } elseif ($carRegistration->invoice_attachment) {
            $carRegistration->invoice_attachment->delete();
        }

        if (count($carRegistration->photos) > 0) {
            foreach ($carRegistration->photos as $media) {
                if (!in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $carRegistration->photos->pluck('file_name')->toArray();
        foreach ($request->input('photos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $carRegistration->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
            }
        }

        return redirect()->route('admin.car-registrations.index');
    }

    public function show(CarRegistration $carRegistration)
    {
        abort_if(Gate::denies('car_registration_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carRegistration->load('city', 'product_name', 'product_size', 'retailer');

        return view('admin.carRegistrations.show', compact('carRegistration'));
    }

    public function destroy(CarRegistration $carRegistration)
    {
        abort_if(Gate::denies('car_registration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carRegistration->delete();

        return back();
    }

    public function massDestroy(MassDestroyCarRegistrationRequest $request)
    {
        CarRegistration::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('car_registration_create') && Gate::denies('car_registration_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CarRegistration();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
    
    public function changeRegistrationStatus(Request $request){
        
        $carRegistration = CarRegistration::findOrFail($request->id);
        $carRegistration->is_approved = 1;
        $carRegistration->update();
        
        $warranty_data = array();
        $warranty_data['name']  = $carRegistration->first_name.' '.$carRegistration->last_name;
        $warranty_data['email'] = $carRegistration->email;
        $warranty_data['date_purchased'] = $carRegistration->date_purchased;
        $warranty_data['warranty_number'] = $carRegistration->warranty_number;
        
        if($carRegistration->update()) {
            
            
        
            $cardSize = array(0,0,380,600);
            $pdf = PDF::loadView('warranty-register.car-warranty-card',compact('warranty_data') )->setPaper($cardSize, 'landscape');;
            
            // Mail::to('ratan.mia@kawasaki.com.bd')->send(new \App\Mail\WarrantyRegistrationNumber($warranty_data));
            
            Mail::send('Email.warranty-registration', compact('warranty_data'), function($message) use($warranty_data,$pdf) {
                $message->to($warranty_data["email"], $warranty_data["name"])
                 ->cc('sales@pirelli.com.bd', 'Pirelli Sales')
                ->subject('New Warranty Registration')
                ->attachData($pdf->output(), "warranty-card.pdf");
                });
                
         
          
        
            
             return $carRegistration;
        }
        
       
        
    }
}
