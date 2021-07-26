<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreContactRequest;
use App\Models\CarModel;
use App\Models\CarSlider;
use App\Models\Category;
use App\Models\City;
use App\Models\Contact;
use App\Models\HomeSlider;
use App\Models\MotoModel;
use App\Models\MotoSlider;
use App\Models\MotoTyre;
use App\Models\Retailer;
use App\Models\Tyre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Newsletter;

class HomeController extends Controller
{
    use MediaUploadingTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function newsletter(Request $request)
    {
        if ( ! Newsletter::isSubscribed($request->user_email) ) {
            Newsletter::subscribe($request->user_email);
        }

        return Redirect::back()->with('status', 'You have successfully subscribed our newsletter!');
    }



    public function index()
    {

        $homeSliders = HomeSlider::with(['media'])->get();

        return view('index', compact('homeSliders'));
    }

    public function motoHome()
    {

        $motoSliders = MotoSlider::with(['media'])->get();
        $tyres = MotoTyre::with(['media'])->get();

        return view('moto', compact('motoSliders','tyres'));

    }

    public function carHome()
    {
        $tyres = Tyre::with(['media'])->get();
        $carSliders = CarSlider::with(['media'])->get();

        return view('car', compact('carSliders','tyres'));

    }





    public function admin()
    {
        return view('dashboard');
    }


    public function table(Request $request)
    {
        $tyres = Tyre::filterByRequest($request)->with(['model_combinations', 'categoys', 'width', 'ratio', 'size', 'media'])->paginate(9);


        return view('search.search', compact('tyres'));
    }



    public function carSearchBySize(Request $request)
    {
        $tyres = Tyre::FilterBySize($request)->with(['categories', 'width', 'ratio', 'size', 'media'])->paginate(9);


        return view('search.search', compact('tyres'));
    }





    public function motoTyreSearchByModel(Request $request)
    {
        $tyres = MotoTyre::searchMotoTyreByModel($request)->with(['categories', 'moto_width', 'moto_ratio', 'moto_size', 'media'])->paginate(9);


        return view('search.moto-search', compact('tyres'));
    }





    public function motoTyreSearchBySize(Request $request)
    {
        $tyres = MotoTyre::searchMotoTyreBySize($request)->with(['categories', 'moto_width', 'moto_ratio', 'moto_size', 'media'])->paginate(9);


        return view('search.moto-search', compact('tyres'));
    }




    public function getMotoModelsByBrand(Request $request)
    {
        if(!isset($request->brand_id)) {
            return response()->json(null, 404);
        }

        $models = MotoModel::where('moto_brand_id', $request->brand_id)->orderBy('model')->get();

        $models->values()->all();

        return $models;
    }






    public function motoTyre(MotoTyre $motoTyre)
    {
        return view('search.company', compact ('motoTyre'));
    }



    public function showMotoTyre(MotoTyre $tyre)
    {

        $tyre = MotoTyre::where('id', $tyre->id)
            ->with(['categories', 'moto_width', 'moto_ratio', 'moto_size', 'media'])->first();

        return view('search.moto-tyre', compact('tyre'));
    }

    public function showCarTyre(Tyre $tyre)
    {

        $tyre = Tyre::where('id', $tyre->id)
            ->with(['model_combinations', 'width', 'ratio', 'size', 'media'])->first();

        return view('search.car-tyre', compact('tyre'));
    }

    public function carRetailerList(Request $request)
    {
        $cities = City::all();


        $city_id ='';
        if ($request->has('city_id')){
            $city_id = $request->city_id;

        }
        $retailers = Retailer::with(['city'])
            ->searchResults()
            ->paginate(9);

        $mapRetailers = $retailers->makeHidden(['active', 'created_at', 'updated_at', 'deleted_at', 'created_by_id', 'photos', 'media']);
        $latitude = $retailers->count() && (request()->filled('city') || request()->filled('search')) ? $retailers->average('latitude') : 23.810332;
        $longitude = $retailers->count() && (request()->filled('city') || request()->filled('search')) ? $retailers->average('longitude') :90.4125181;

        return view('car-retailer', compact('cities', 'retailers', 'mapRetailers', 'latitude', 'longitude','city_id'));
    }


    public function motoRetailerList(Request $request)
    {
        $cities = City::all();


        $city_id ='';
        if ($request->has('city_id')){
            $city_id = $request->city_id;

        }
        $retailers = Retailer::with(['city'])
            ->motoSearchResults()
            ->paginate(9);

        $mapRetailers = $retailers->makeHidden(['active', 'created_at', 'updated_at', 'deleted_at', 'created_by_id', 'photos', 'media']);
        $latitude = $retailers->count() && (request()->filled('city') || request()->filled('search')) ? $retailers->average('latitude') : 23.810332;
        $longitude = $retailers->count() && (request()->filled('city') || request()->filled('search')) ? $retailers->average('longitude') :90.4125181;

        return view('moto-retailer', compact('cities', 'retailers', 'mapRetailers', 'latitude', 'longitude','city_id'));
    }




    public function about(){
        return view('about');
    }

    public function createForm(){
        return view('contact');
    }


    public function contactSubmit(StoreContactRequest $request)
    {
        $contact = Contact::create($request->all());

        //  Send mail to admin

        Mail::to('ratan.mia@kawasaki.com.bd')->send(new \App\Mail\ContactSubmitted($contact));

        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }


}
