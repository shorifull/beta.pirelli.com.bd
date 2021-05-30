<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\CarModel;
use App\Models\CarSlider;
use App\Models\HomeSlider;
use App\Models\MotoModel;
use App\Models\MotoSlider;
use App\Models\MotoTyre;
use App\Models\Tyre;
use Illuminate\Http\Request;

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


}
