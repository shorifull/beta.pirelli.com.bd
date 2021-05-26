<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWarrantyRequest;
use App\Http\Services\CarApi;
use App\Http\Services\MotoApi;
use App\Http\Services\ZohoService;
use App\Models\City;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Retailer;
use App\Models\VehicleType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class WarrantyRegisterController extends Controller
{
    public function registerCar()
    {
        $vehicleType = VehicleType::where(['slug' => 'car'])->first();
        $cities = City::orderBy('name', 'asc')->get();
        $products = $vehicleType->products;
        $retailers = $vehicleType->retailers;
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

    public function productSizes($productName)
    {
        $productSizes = ProductSize::getProductSizes(urldecode($productName));

        return $productSizes;
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
        $data = [
            'First_Name' => $request->first_name,
            'Last_Name' => $request->last_name,
            'Email' => $request->email,
            'Phone' => $request->phone,
            'Mailing_City' => $request->city,
            'Mailing_Street' => $request->address,
            'Mailing_Zip' => $request->zip,
            'Invoice_Number' => $request->invoice_number,
            'Purchase_Date' => $request->date_purchased,
            'Product_Name' => $request->product_name,
            'DOT' => $request->product_dot,
            'Product_Size' => $request->product_size,
            'Retailer_Area1' => $request->quantity_purchased,
            'Retailer_Name' => $request->retailer_name,
            'Email_Opt_Out' => $request->subscribed ? false : true,
        ];
        $file = $request->file('invoice_attachment');

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
        $data = [
            'First_Name' => $request->first_name,
            'Last_Name' => $request->last_name,
            'Email' => $request->email,
            'Phone' => $request->phone,
            'Mailing_City' => $request->city,
            'Mailing_Street' => $request->address,
            'Mailing_Zip' => $request->zip,
            'Invoice_Number' => $request->invoice_number,
            'Date_Purchased' => $request->date_purchased,
            'Product_Name' => $request->product_name,
            'Product_DOT' => $request->product_dot,
            'Product_Size' => $request->product_size,
            'QTY_Purchased' => $request->quantity_purchased,
            'Retailer_Name' => $request->retailer_name,
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

            if($response == 'success') {
                return redirect(route('warranty-register-moto-success'));
            }
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
