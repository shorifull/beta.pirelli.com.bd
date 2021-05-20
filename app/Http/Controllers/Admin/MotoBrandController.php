<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMotoBrandRequest;
use App\Http\Requests\StoreMotoBrandRequest;
use App\Http\Requests\UpdateMotoBrandRequest;
use App\Models\MotoBrand;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MotoBrandController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('moto_brand_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motoBrands = MotoBrand::all();

        return view('admin.motoBrands.index', compact('motoBrands'));
    }

    public function create()
    {
        abort_if(Gate::denies('moto_brand_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.motoBrands.create');
    }

    public function store(StoreMotoBrandRequest $request)
    {
        $motoBrand = MotoBrand::create($request->all());

        return redirect()->route('admin.moto-brands.index');
    }

    public function edit(MotoBrand $motoBrand)
    {
        abort_if(Gate::denies('moto_brand_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.motoBrands.edit', compact('motoBrand'));
    }

    public function update(UpdateMotoBrandRequest $request, MotoBrand $motoBrand)
    {
        $motoBrand->update($request->all());

        return redirect()->route('admin.moto-brands.index');
    }

    public function show(MotoBrand $motoBrand)
    {
        abort_if(Gate::denies('moto_brand_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.motoBrands.show', compact('motoBrand'));
    }

    public function destroy(MotoBrand $motoBrand)
    {
        abort_if(Gate::denies('moto_brand_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motoBrand->delete();

        return back();
    }

    public function massDestroy(MassDestroyMotoBrandRequest $request)
    {
        MotoBrand::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
