<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRatioRequest;
use App\Http\Requests\StoreRatioRequest;
use App\Http\Requests\UpdateRatioRequest;
use App\Models\Ratio;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RatioController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ratio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ratios = Ratio::all();

        return view('admin.ratios.index', compact('ratios'));
    }

    public function create()
    {
        abort_if(Gate::denies('ratio_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ratios.create');
    }

    public function store(StoreRatioRequest $request)
    {
        $ratio = Ratio::create($request->all());

        return redirect()->route('admin.ratios.index');
    }

    public function edit(Ratio $ratio)
    {
        abort_if(Gate::denies('ratio_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ratios.edit', compact('ratio'));
    }

    public function update(UpdateRatioRequest $request, Ratio $ratio)
    {
        $ratio->update($request->all());

        return redirect()->route('admin.ratios.index');
    }

    public function show(Ratio $ratio)
    {
        abort_if(Gate::denies('ratio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ratios.show', compact('ratio'));
    }

    public function destroy(Ratio $ratio)
    {
        abort_if(Gate::denies('ratio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ratio->delete();

        return back();
    }

    public function massDestroy(MassDestroyRatioRequest $request)
    {
        Ratio::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
