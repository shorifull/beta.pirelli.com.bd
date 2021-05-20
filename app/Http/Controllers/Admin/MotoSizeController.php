<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMotoSizeRequest;
use App\Http\Requests\StoreMotoSizeRequest;
use App\Http\Requests\UpdateMotoSizeRequest;
use App\Models\MotoSize;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MotoSizeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('moto_size_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motoSizes = MotoSize::all();

        return view('admin.motoSizes.index', compact('motoSizes'));
    }

    public function create()
    {
        abort_if(Gate::denies('moto_size_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.motoSizes.create');
    }

    public function store(StoreMotoSizeRequest $request)
    {
        $motoSize = MotoSize::create($request->all());

        return redirect()->route('admin.moto-sizes.index');
    }

    public function edit(MotoSize $motoSize)
    {
        abort_if(Gate::denies('moto_size_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.motoSizes.edit', compact('motoSize'));
    }

    public function update(UpdateMotoSizeRequest $request, MotoSize $motoSize)
    {
        $motoSize->update($request->all());

        return redirect()->route('admin.moto-sizes.index');
    }

    public function show(MotoSize $motoSize)
    {
        abort_if(Gate::denies('moto_size_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.motoSizes.show', compact('motoSize'));
    }

    public function destroy(MotoSize $motoSize)
    {
        abort_if(Gate::denies('moto_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motoSize->delete();

        return back();
    }

    public function massDestroy(MassDestroyMotoSizeRequest $request)
    {
        MotoSize::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
