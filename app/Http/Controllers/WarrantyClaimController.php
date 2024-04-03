<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreWarrantyClaimRequest;
use App\Http\Requests\StoreWarrantyRequest;
use App\Http\Services\CarApi;
use App\Models\CarRegistration;
use App\Models\City;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Retailer;
use App\Models\VehicleType;
use App\Models\WarrantyClaim;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\IpUtils;
use App\Providers\RouteServiceProvider;

class WarrantyClaimController extends Controller
{
    use MediaUploadingTrait;



    public function claimWarranty()
    {
        $vehicleType = VehicleType::where(['slug' => 'car'])->first();
        $cities = City::orderBy('name', 'asc')->get();
        $products = Product::where('vehicle_type_id', '1')->get();
        $retailers = Retailer::where('vehicle_type_id', '1')->get();
        $tyreSizes = ProductSize::all()->sortBy('size')->uniqueStrict('size');
        return view('warranty-register.warranty-claim', compact('products', 'tyreSizes', 'retailers', 'cities'));
    }




    public function claimCarWarranty(StoreWarrantyClaimRequest $request)
    {

        // write the functionalities to very google recaptcha
        $recaptcha_response = $request->input('g-recaptcha-response');
        if (is_null($recaptcha_response)) {
            return redirect()->back()->with('status', 'Please Complete the Recaptcha to proceed');
        }

        $url = 'https://www.google.com/recaptcha/api/siteverify';

        $body = [
            'secret' => config('services.recaptcha.secret'),
            'response' => $recaptcha_response,
            'remoteip' => IpUtils::anonymize($request->ip()) //anonymize the ip to be GDPR compliant. Otherwise just pass the default ip address
        ];

        $response = Http::asForm()->post($url, $body);

        $result = json_decode($response);

        if ($response->successful() && $result->success == true) {
            $request->authenticate();

            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME);
        } else {
            return redirect()->back()->with('status', 'Please Complete the Recaptcha Again to proceed');
        }



        // dd($request);
        $product_name = Product::select('name')
            ->where('id', $request->product_name_id)
            ->first();

        $product_size = ProductSize::select('size')
            ->where('id', $request->product_size_id)
            ->first();



        $city = City::select('name')
            ->where('id', $request->city)
            ->first();

        $retailer = Retailer::select('name')
            ->where('id', $request->retailer_id)
            ->first();

        $data = [
            'First_Name' => $request->first_name,
            'Last_Name' => $request->last_name,
            'Email' => $request->email,
            'Phone' => $request->phone,
            'Mailing_City' => $city->name,
            'Mailing_Street' => $request->address,
            'Mailing_Zip' => $request->zip,
            'Invoice_No' => $request->invoice_number,
            'Date_Purchased' => $request->date_purchased,
            'Product_Name' => $product_name->name,
            'DOT' => $request->product_dot,
            'Product_Size' => $product_size->size,
            'Retailer_Area1' => $request->quantity_purchased,
            //            'Vendor_Name' => $retailer->name,
            'Retailer_Name' => $retailer->name,
            'Email_Opt_Out' => $request->subscribed ? false : true,
        ];
        $file = $request->file('invoice_attachment');

        $warrantyClaim = new WarrantyClaim();
        $warrantyClaim->first_name = $request->first_name;
        $warrantyClaim->last_name = $request->last_name;
        $warrantyClaim->email = $request->email;
        $warrantyClaim->phone = $request->phone;
        $warrantyClaim->city_id = $request->city;
        $warrantyClaim->address = $request->address;
        $warrantyClaim->invoice_number = $request->invoice_number;
        $warrantyClaim->product_name_id = $request->product_name_id;
        $warrantyClaim->product_size_id = $request->product_size_id;
        $warrantyClaim->warranty_number = Str::random(10);




        $warrantyClaim->save();

        if ($request->file('photos')) {
            foreach ($request->file('photos') as $photo) {
                $warrantyClaim->addMedia($photo)->toMediaCollection('photos');
            }
        }





        try {
            $api = app(CarApi::class, config('zoho.car'));
            $response = $api->insertContact($data);
            $response = json_decode($response);





            if ($response->data[0]->status == 'error') {
                return Redirect::back()->with('status', 'There has been some error and your data could not be submitted.. `Please try again.');
                //                return redirect(route('warranty-register-moto-error'));
                //                dd($response);
            }

            $id = $response->data[0]->details->id;



            if ($request->file('photos')) {
                foreach ($request->file('photos') as $photo) {
                    //                    $response = $api->uploadFile($id, $photo);
                }
            }



            if ($file) {
                $response = $api->uploadFile($id, $file);
                $warrantyClaim->addMedia($request->file('invoice_attachment'))->toMediaCollection('invoice_attachment');
            }

            if ($response == 'success') {
                //                return redirect(route('warranty-register-car-success'));
                return Redirect::back()->with('status', 'Warranty claim application submitted successfully. `Pirelli team will contact you soon.');
            }
        } catch (Exception $e) {
            dd($e);
            //            return redirect(route('warranty-register-moto-error'));
            return Redirect::back()->with('status', 'There has been some error and your data could not be submitted.. `Please try again.');
        }
    }
}
