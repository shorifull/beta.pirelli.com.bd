<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMotoEngineRequest;
use App\Http\Requests\StoreMotoEngineRequest;
use App\Http\Requests\UpdateMotoEngineRequest;
use App\Models\MotoEngine;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MotoEngineController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('moto_engine_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motoEngines = MotoEngine::all();

        return view('admin.motoEngines.index', compact('motoEngines'));
    }

    public function create()
    {
        abort_if(Gate::denies('moto_engine_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.motoEngines.create');
    }

    public function store(StoreMotoEngineRequest $request)
    {
        $motoEngine = MotoEngine::create($request->all());

        return redirect()->route('admin.moto-engines.index');
    }

    public function edit(MotoEngine $motoEngine)
    {
        abort_if(Gate::denies('moto_engine_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.motoEngines.edit', compact('motoEngine'));
    }

    public function update(UpdateMotoEngineRequest $request, MotoEngine $motoEngine)
    {
        $motoEngine->update($request->all());

        return redirect()->route('admin.moto-engines.index');
    }

    public function show(MotoEngine $motoEngine)
    {
        abort_if(Gate::denies('moto_engine_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.motoEngines.show', compact('motoEngine'));
    }

    public function destroy(MotoEngine $motoEngine)
    {
        abort_if(Gate::denies('moto_engine_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motoEngine->delete();

        return back();
    }

    public function massDestroy(MassDestroyMotoEngineRequest $request)
    {
        MotoEngine::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
