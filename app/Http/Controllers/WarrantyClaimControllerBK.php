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

class WarrantyClaimControllerBK extends Controller
{
    use MediaUploadingTrait;

    public function claimWarranty()
    {
        $vehicleType = VehicleType::where(['slug' => 'car'])->first();
        $cities = City::orderBy('name', 'asc')->get();
        $products = Product::where('vehicle_type_id','1')->get();
        $retailers = Retailer::where('vehicle_type_id','1')->get();
        $tyreSizes = ProductSize::all();
        return view('warranty-register.warranty-claim', compact('products','tyreSizes', 'retailers', 'cities'));
    }




    public function claimCarWarranty(StoreWarrantyClaimRequest $request)
    {


        // dd($request);
        $product_name = Product::select('name')
            ->where('id',$request->product_name_id)
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
            'Invoice_No' => $request->invoice_number,
            'Date_Purchased' => $request->date_purchased,
            'Product_Name' => $product_name->name,
            'DOT' => $request->product_dot,
            'Product_Size' => $request->product_size,
            'Retailer_Area1' => $request->quantity_purchased,
//            'Vendor_Name' => $retailer->name,
            'Retailer_Name' => $retailer->name,
            'Email_Opt_Out' => $request->subscribed ? false : true,
        ];
        $file = $request->file('invoice_attachment');




        // Save into database

//        $carRegistration = new CarRegistration();
//        $carRegistration->first_name = $request->first_name;
//        $carRegistration->last_name = $request->last_name;
//        $carRegistration->email = $request->email;
//        $carRegistration->phone = $request->phone;
//        $carRegistration->city_id = $request->city;
//        $carRegistration->address = $request->address;
//        $carRegistration->zip = $request->zip;
//        $carRegistration->date_purchased = Carbon::createFromFormat('Y-m-d', $request->date_purchased)->format('d-m-Y');
//        $carRegistration->product_name_id = $request->product_name_id;
//        $carRegistration->invoice_number = $request->invoice_number;
//        $carRegistration->product_size_id = $request->product_size;
//        $carRegistration->product_dot = $request->product_dot;
//        $carRegistration->product_quantity = $request->quantity_purchased;
//
//        $carRegistration->warranty_number = Str::random(10);
//        $carRegistration->save();

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

        if($request->file('photos')) {
            foreach ($request->file('photos') as $photo) {
                $warrantyClaim->addMedia($photo)->toMediaCollection('photos');
            }
        }





        try {
            $api = app(CarApi::class, config('zoho.car'));
            $response = $api->insertContact($data);
            $response = json_decode($response);





            if($response->data[0]->status == 'error') {
                return Redirect::back()->with('status', 'There has been some error and your data could not be submitted.. `Please try again.');
//                return redirect(route('warranty-register-moto-error'));
//                dd($response);
            }

            $id = $response->data[0]->details->id;

            if($request->file('photos')) {
                $photos = $request->file('photos');
                $response = $api->uploadFile($id, $photos);

            }


            if ($file) {
                $response = $api->uploadFile($id, $file);
                $warrantyClaim->addMedia($request->file('invoice_attachment'))->toMediaCollection('invoice_attachment');

            }

            if($response == 'success') {
//                return redirect(route('warranty-register-car-success'));
                return Redirect::back()->with('status', 'Warranty claim application submitted successfully. `Pirelli team will contact you soon.');
            }
        } catch(Exception $e) {
            dd($e);
//            return redirect(route('warranty-register-moto-error'));
            return Redirect::back()->with('status', 'There has been some error and your data could not be submitted.. `Please try again.');
        }
    }

    public function claimCarWarrantyBK(StoreWarrantyClaimRequest $request)
    {
        // Use Eloquent's find() method to simplify fetching single record by primary key
        $product_name = Product::find($request->product_name_id)->name ?? 'Product Not Found';
        $city_name = City::find($request->city)->name ?? 'City Not Found';
        $retailer_name = Retailer::find($request->retailer_id)->name ?? 'Retailer Not Found';

        $data = [
            'First_Name' => $request->first_name,
            'Last_Name' => $request->last_name,
            'Email' => $request->email,
            'Phone' => $request->phone,
            'Mailing_City' => $city_name,
            'Mailing_Street' => $request->address,
            'Mailing_Zip' => $request->zip,
            'Invoice_No' => $request->invoice_number,
            'Date_Purchased' => $request->date_purchased,
            'Product_Name' => $product_name,
            'DOT' => $request->product_dot,
            'Product_Size' => $request->product_size,
            'Retailer_Area1' => $request->quantity_purchased,
            'Retailer_Name' => $retailer_name,
            'Email_Opt_Out' => !$request->subscribed,
        ];

        $warrantyClaim = new WarrantyClaim($request->only([
            'first_name', 'last_name', 'email', 'phone', 'city', 'address',
            'invoice_number', 'product_name_id', 'product_size_id'
        ]));
        // Generate and assign a random warranty number
        $warrantyClaim->warranty_number = Str::random(10);
        $warrantyClaim->save();

        // Handle photo uploads more efficiently
        if($photos = $request->file('photos')) {
            foreach ($photos as $photo) {
                $warrantyClaim->addMedia($photo)->toMediaCollection('photos');
            }
        }

        // Centralize API error handling
        try {
            $apiResponse = $this->submitWarrantyClaimToApi($data, $warrantyClaim, $request->file('invoice_attachment'), $photos ?? []);

            if ($apiResponse === 'success') {
                return back()->with('status', 'Warranty claim application submitted successfully. Our team will contact you soon.');
            }

            // Handle different response scenarios here as needed
            return back()->with('status', 'There has been an error with your application. Please try again.');
        } catch (Exception $e) {
            Log::error('Error submitting warranty claim: '.$e->getMessage());
            return back()->with('status', 'There has been a technical issue. Please try again later.');
        }
    }

    protected function submitWarrantyClaimToApi(array $data, WarrantyClaim $warrantyClaim, $invoiceAttachment, array $photos)
    {
        $api = app(CarApi::class, config('zoho.car'));
        $response = json_decode($api->insertContact($data));

        if ($response->data[0]->status === 'error') {
            throw new Exception('API submission error');
        }

        $id = $response->data[0]->details->id;

        if ($invoiceAttachment) {
            $api->uploadFile($id, $invoiceAttachment);
            $warrantyClaim->addMedia($invoiceAttachment)->toMediaCollection('invoice_attachment');
        }

        foreach ($photos as $photo) {
            $api->uploadFile($id, $photo);
        }

        return 'success';
    }
}
