<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMotoWidthRequest;
use App\Http\Requests\StoreMotoWidthRequest;
use App\Http\Requests\UpdateMotoWidthRequest;
use App\Models\MotoWidth;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MotoWidthController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('moto_width_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motoWidths = MotoWidth::all();

        return view('admin.motoWidths.index', compact('motoWidths'));
    }

    public function create()
    {
        abort_if(Gate::denies('moto_width_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.motoWidths.create');
    }

    public function store(StoreMotoWidthRequest $request)
    {
        $motoWidth = MotoWidth::create($request->all());

        return redirect()->route('admin.moto-widths.index');
    }

    public function edit(MotoWidth $motoWidth)
    {
        abort_if(Gate::denies('moto_width_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.motoWidths.edit', compact('motoWidth'));
    }

    public function update(UpdateMotoWidthRequest $request, MotoWidth $motoWidth)
    {
        $motoWidth->update($request->all());

        return redirect()->route('admin.moto-widths.index');
    }

    public function show(MotoWidth $motoWidth)
    {
        abort_if(Gate::denies('moto_width_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.motoWidths.show', compact('motoWidth'));
    }

    public function destroy(MotoWidth $motoWidth)
    {
        abort_if(Gate::denies('moto_width_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motoWidth->delete();

        return back();
    }

    public function massDestroy(MassDestroyMotoWidthRequest $request)
    {
        MotoWidth::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
