<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\MediaUploadingTrait;
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

    public function admin()
    {
        return view('dashboard');
    }


    public function table(Request $request)
    {
        $tyres = Tyre::filterByRequest($request)->with(['model_combinations', 'categoys', 'width', 'ratio', 'size', 'media'])->paginate(9);


        return view('mainTable.search', compact('tyres'));
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
