<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMotoRatioRequest;
use App\Http\Requests\StoreMotoRatioRequest;
use App\Http\Requests\UpdateMotoRatioRequest;
use App\Models\MotoRatio;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MotoRatioController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('moto_ratio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motoRatios = MotoRatio::all();

        return view('admin.motoRatios.index', compact('motoRatios'));
    }

    public function create()
    {
        abort_if(Gate::denies('moto_ratio_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.motoRatios.create');
    }

    public function store(StoreMotoRatioRequest $request)
    {
        $motoRatio = MotoRatio::create($request->all());

        return redirect()->route('admin.moto-ratios.index');
    }

    public function edit(MotoRatio $motoRatio)
    {
        abort_if(Gate::denies('moto_ratio_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.motoRatios.edit', compact('motoRatio'));
    }

    public function update(UpdateMotoRatioRequest $request, MotoRatio $motoRatio)
    {
        $motoRatio->update($request->all());

        return redirect()->route('admin.moto-ratios.index');
    }

    public function show(MotoRatio $motoRatio)
    {
        abort_if(Gate::denies('moto_ratio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.motoRatios.show', compact('motoRatio'));
    }

    public function destroy(MotoRatio $motoRatio)
    {
        abort_if(Gate::denies('moto_ratio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motoRatio->delete();

        return back();
    }

    public function massDestroy(MassDestroyMotoRatioRequest $request)
    {
        MotoRatio::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
