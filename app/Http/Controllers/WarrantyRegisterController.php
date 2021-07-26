<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreWarrantyClaimRequest;
use App\Http\Requests\StoreWarrantyRequest;
use App\Http\Services\CarApi;
use App\Http\Services\MotoApi;
use App\Http\Services\ZohoService;
use App\Models\CarRegistration;
use App\Models\City;
use App\Models\MotoRegistration;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Retailer;
use App\Models\VehicleType;
use App\Models\WarrantyClaim;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class WarrantyRegisterController extends Controller
{
    use MediaUploadingTrait;
    public function registerCar()
    {
        $vehicleType = VehicleType::where(['slug' => 'car'])->first();
        $cities = City::orderBy('name', 'asc')->get();
        $products = Product::where('vehicle_type_id','1')->get();
        $retailers = Retailer::where('vehicle_type_id','1')->get();
        return view('warranty-register.car', compact('products', 'retailers', 'cities'));
    }

    public function registerMoto()
    {
        $vehicleType = VehicleType::where(['slug' => 'moto'])->first();
        $cities = City::orderBy('name', 'asc')->get();
        $products = Product::where('vehicle_type_id','2')->get();
        $retailers = Retailer::where('vehicle_type_id','2')->get();
        return view('warranty-register.moto', compact('products', 'retailers', 'cities'));
    }






    public function productSizes($productId)
    {
        $productSizes = ProductSize::getProductSizes(urldecode($productId));

        return $productSizes;
    }


    public function motoInvoiceDetails($invoiceNo)
    {
        $invoice = MotoRegistration::where('invoice_number', $invoiceNo)->with('product_name','product_size','retailer')->first();

        return $invoice;
    }



    public function thankyouCar()
    {
        return view('warranty-register.thankyou-car');
    }
    public function thankyouMoto()
    {
        return view('warranty-register.thankyou-moto');
    }

    public function registrationCarError()
    {
        return view('warranty-register.car-error');
    }

    public function registrationMotoError()
    {
        return view('warranty-register.moto-error');
    }

    public function addCarWarranty(StoreWarrantyRequest $request)
    {

        $product_name = Product::select('name')
            ->where('id',$request->product_id)
            ->first();

        $city = City::select('name')
            ->where('id',$request->city)
            ->first();

        $retailer = Retailer::select('name')
            ->where('id',$request->retailer_id)
            ->first();

        $data = [
            'First_Name' => $request->first_name,
            'Last_Name' => $request->last_name,
            'Email' => $request->email,
            'Phone' => $request->phone,
            'Mailing_City' => $city->name,
            'Mailing_Street' => $request->address,
            'Mailing_Zip' => $request->zip,
            'Invoice_Number' => $request->invoice_number,
            'Purchase_Date' => $request->date_purchased,
            'Product_Name' => $product_name->name,
            'DOT' => $request->product_dot,
            'Product_Size' => $request->product_size,
            'Retailer_Area1' => $request->quantity_purchased,
            'Retailer_Name' => $retailer->name,
            'Email_Opt_Out' => $request->subscribed ? false : true,
        ];
        $file = $request->file('invoice_attachment');


        // Save into database

        $carRegistration = new CarRegistration();
        $carRegistration->first_name = $request->first_name;
        $carRegistration->last_name = $request->last_name;
        $carRegistration->email = $request->email;
        $carRegistration->phone = $request->phone;
        $carRegistration->city_id = $request->city;
        $carRegistration->address = $request->address;
        $carRegistration->zip = $request->zip;
        $carRegistration->date_purchased = Carbon::createFromFormat('Y-m-d', $request->date_purchased)->format('d-m-Y');
        $carRegistration->product_name_id = $request->product_id;
        $carRegistration->invoice_number = $request->invoice_number;
        $carRegistration->product_size_id = $request->product_size;
        $carRegistration->product_dot = $request->product_dot;
        $carRegistration->product_quantity = $request->quantity_purchased;

        $carRegistration->warranty_number = Str::random(10);
        $carRegistration->save();

        Mail::to('ratan.mia@kawasaki.com.bd')->send(new \App\Mail\WarrantyRegistrationNumber($carRegistration));




        if ($file) {

            $carRegistration->addMedia($request->file('invoice_attachment'))->toMediaCollection('invoice_attachment');

        }

        try {
            $api = app(CarApi::class, config('zoho.car'));
            $response = $api->insertContact($data);
            $response = json_decode($response);

            if($response->data[0]->status == 'error') {
                return redirect(route('warranty-register-car-error'));
            }

            $id = $response->data[0]->details->id;
            $response = $api->uploadFile($id, $file);

            if($response == 'success') {
                return redirect(route('warranty-register-car-success'));
            }
        } catch(Exception $e) {
            return redirect(route('warranty-register-car-error'));
        }
    }

    public function addMotoWarranty(StoreWarrantyRequest $request)
    {

        $product_name = Product::select('name')
            ->where('id',$request->product_id)
            ->first();

        $city = City::select('name')
            ->where('id',$request->city)
            ->first();
        $retailer = Retailer::select('name')
            ->where('id',$request->retailer_id)
            ->first();

        $data = [
            'First_Name' => $request->first_name,
            'Last_Name' => $request->last_name,
            'Email' => $request->email,
            'Phone' => $request->phone,
            'Mailing_City' => $city->name,
            'Mailing_Street' => $request->address,
            'Mailing_Zip' => $request->zip,
            'Invoice_Number' => $request->invoice_number,
            'Date_Purchased' => $request->date_purchased,
            'Product_Name' => $product_name->name,
            'Product_DOT' => $request->product_dot,
            'Product_Size' => $request->product_size,
            'QTY_Purchased' => $request->quantity_purchased,
            'Retailer_Name' => $retailer->name,
            'Email_Opt_Out' => $request->subscribed ? false : true,
        ];
        $file = $request->file('invoice_attachment');

        try {
            $api = app(MotoApi::class, config('zoho.moto'));

            $response = $api->insertContact($data);
            $response = json_decode($response);
            if($response->data[0]->status == 'error') {
                return redirect(route('warranty-register-moto-error'));

            }



            $id = $response->data[0]->details->id;
            $response = $api->uploadFile($id, $file);

            // Save into database

            $motoRegistration = new MotoRegistration();
            $motoRegistration->first_name = $request->first_name;
            $motoRegistration->last_name = $request->last_name;
            $motoRegistration->email = $request->email;
            $motoRegistration->phone = $request->phone;
            $motoRegistration->city_id = $request->city;
            $motoRegistration->address = $request->address;
            $motoRegistration->zip = $request->zip;
            $motoRegistration->date_purchased = Carbon::createFromFormat('Y-m-d', $request->date_purchased)->format('d-m-Y');
            $motoRegistration->product_name_id = $request->product_id;
            $motoRegistration->invoice_number = $request->invoice_number;
            $motoRegistration->product_size_id = $request->product_size;
            $motoRegistration->product_dot = $request->product_dot;
            $motoRegistration->product_quantity = $request->quantity_purchased;



            $motoRegistration->warranty_number = Str::random(10);
            $motoRegistration->save();

            Mail::to('ratan.mia@kawasaki.com.bd')->send(new \App\Mail\WarrantyRegistrationNumber($motoRegistration));


            if ($file) {

                $motoRegistration->addMedia($request->file('invoice_attachment'))->toMediaCollection('invoice_attachment');

            }



            if($response == 'success') {
                return redirect(route('warranty-register-moto-success'));
            }
        } catch(Exception $e) {
            return redirect(route('warranty-register-moto-error'))->withError($e->getMessage());
        }
    }





    public function motoWarrantyClaim()
    {
        $vehicleType = VehicleType::where(['slug' => 'moto'])->first();
        $cities = City::orderBy('name', 'asc')->get();
        $products = Product::where('vehicle_type_id','2')->get();
        $retailers = Retailer::where('vehicle_type_id','2')->get();
        return view('warranty-register.moto-warranty-claim', compact('products', 'retailers', 'cities'));
    }




    public function claimMotoWarranty(StoreWarrantyClaimRequest $request)
    {


        try {

            $warrantyClaim = new WarrantyClaim();
            $warrantyClaim->invoice_number = $request->invoice_number;
            $warrantyClaim->product_name_id = $request->product_name_id;
            $warrantyClaim->product_size_id = $request->product_size_id;
            $warrantyClaim->warranty_number = Str::random(10);


            $warrantyClaim->save();




            if($request->file('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $warrantyClaim->addMedia($photo)->toMediaCollection('photos');
                }
            }

            return Redirect::back()->with('status', 'You have successfully claimed your warranty!');
        } catch(Exception $e) {
        return redirect(route('warranty-register-moto-error'))->withError($e->getMessage());
    }



    }


    public function carWarrantyClaim()
    {
        $vehicleType = VehicleType::where(['slug' => 'car'])->first();
        $cities = City::orderBy('name', 'asc')->get();
        $products = Product::where('vehicle_type_id','1')->get();
        $retailers = Retailer::where('vehicle_type_id','1')->get();
        return view('warranty-register.car-warranty-claim', compact('products', 'retailers', 'cities'));
    }




    public function claimCarWarranty(StoreWarrantyClaimRequest $request)
    {


        try {

            $warrantyClaim = new WarrantyClaim();
            $warrantyClaim->invoice_number = $request->invoice_number;
            $warrantyClaim->product_name_id = $request->product_name_id;
            $warrantyClaim->product_size_id = $request->product_size_id;
            $warrantyClaim->warranty_number = Str::random(10);


            $warrantyClaim->save();




            if($request->file('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $warrantyClaim->addMedia($photo)->toMediaCollection('photos');
                }
            }

            return Redirect::back()->with('status', 'You have successfully claimed your warranty!');
        } catch(Exception $e) {
            return redirect(route('warranty-register-moto-error'))->withError($e->getMessage());
        }



    }






    protected function testFileUpload(Request $request)
    {
        $api = app(CarApi::class, config('zoho.car'));
        $id = '4812660000000364001';
        $file = $request->file('wr_file');

        $response = $api->uploadFile($id, $file);

    }

    public function testFileForm()
    {
        return view('warranty-register.test-form');
    }

}
