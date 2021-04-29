<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductSizeRequest;
use App\Http\Requests\StoreProductSizeRequest;
use App\Http\Requests\UpdateProductSizeRequest;
use App\Models\Product;
use App\Models\ProductSize;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductSizeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_size_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productSizes = ProductSize::with(['product'])->get();

        return view('admin.productSizes.index', compact('productSizes'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_size_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.productSizes.create', compact('products'));
    }

    public function store(StoreProductSizeRequest $request)
    {
        $productSize = ProductSize::create($request->all());

        return redirect()->route('admin.product-sizes.index');
    }

    public function edit(ProductSize $productSize)
    {
        abort_if(Gate::denies('product_size_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $productSize->load('product');

        return view('admin.productSizes.edit', compact('products', 'productSize'));
    }

    public function update(UpdateProductSizeRequest $request, ProductSize $productSize)
    {
        $productSize->update($request->all());

        return redirect()->route('admin.product-sizes.index');
    }

    public function show(ProductSize $productSize)
    {
        abort_if(Gate::denies('product_size_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productSize->load('product');

        return view('admin.productSizes.show', compact('productSize'));
    }

    public function destroy(ProductSize $productSize)
    {
        abort_if(Gate::denies('product_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productSize->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductSizeRequest $request)
    {
        ProductSize::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
