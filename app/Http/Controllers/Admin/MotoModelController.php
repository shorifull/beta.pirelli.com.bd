<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMotoModelRequest;
use App\Http\Requests\StoreMotoModelRequest;
use App\Http\Requests\UpdateMotoModelRequest;
use App\Models\MotoBrand;
use App\Models\MotoModel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MotoModelController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('moto_model_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motoModels = MotoModel::with(['moto_brand'])->get();

        return view('admin.motoModels.index', compact('motoModels'));
    }

    public function create()
    {
        abort_if(Gate::denies('moto_model_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $moto_brands = MotoBrand::all()->pluck('brand', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.motoModels.create', compact('moto_brands'));
    }

    public function store(StoreMotoModelRequest $request)
    {
        $motoModel = MotoModel::create($request->all());

        return redirect()->route('admin.moto-models.index');
    }

    public function edit(MotoModel $motoModel)
    {
        abort_if(Gate::denies('moto_model_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $moto_brands = MotoBrand::all()->pluck('brand', 'id')->prepend(trans('global.pleaseSelect'), '');

        $motoModel->load('moto_brand');

        return view('admin.motoModels.edit', compact('moto_brands', 'motoModel'));
    }

    public function update(UpdateMotoModelRequest $request, MotoModel $motoModel)
    {
        $motoModel->update($request->all());

        return redirect()->route('admin.moto-models.index');
    }

    public function show(MotoModel $motoModel)
    {
        abort_if(Gate::denies('moto_model_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motoModel->load('moto_brand');

        return view('admin.motoModels.show', compact('motoModel'));
    }

    public function destroy(MotoModel $motoModel)
    {
        abort_if(Gate::denies('moto_model_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motoModel->delete();

        return back();
    }

    public function massDestroy(MassDestroyMotoModelRequest $request)
    {
        MotoModel::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
