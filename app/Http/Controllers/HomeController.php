<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\CarModel;
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
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function motoHome()
    {

        $motoSliders = MotoSlider::with(['media'])->get();

        return view('moto-home', compact('motoSliders'));

    }





    public function admin()
    {
        return view('dashboard');
    }


    public function table(Request $request)
    {
        $tyres = Tyre::filterByRequest($request)->with(['model_combinations', 'categoys', 'width', 'ratio', 'size', 'media'])->paginate(9);


        return view('mainTable.search', compact('tyres'));
    }



    public function carSearchBySize(Request $request)
    {
        $tyres = Tyre::FilterBySize($request)->with(['categories', 'width', 'ratio', 'size', 'media'])->paginate(9);


        return view('mainTable.search', compact('tyres'));
    }





    public function motoTyreSearchByModel(Request $request)
    {
        $tyres = MotoTyre::searchMotoTyreByModel($request)->with(['categories', 'moto_width', 'moto_ratio', 'moto_size', 'media'])->paginate(9);


        return view('mainTable.moto-search', compact('tyres'));
    }





    public function motoTyreSearchBySize(Request $request)
    {
        $tyres = MotoTyre::searchMotoTyreBySize($request)->with(['categories', 'moto_width', 'moto_ratio', 'moto_size', 'media'])->paginate(9);


        return view('mainTable.moto-search', compact('tyres'));
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







    public function category(Category $category)
    {
        $companies = Company::join('category_company', 'companies.id', '=', 'category_company.company_id')
            ->where('category_id', $category->id)
            ->paginate(9);

        return view('mainTable.category', compact('companies', 'category'));
    }

    public function company(Company $company)
    {
        return view('mainTable.company', compact ('company'));
    }
}
