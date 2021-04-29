<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWidthRequest;
use App\Http\Requests\StoreWidthRequest;
use App\Http\Requests\UpdateWidthRequest;
use App\Models\Width;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WidthController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('width_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $widths = Width::all();

        return view('admin.widths.index', compact('widths'));
    }

    public function create()
    {
        abort_if(Gate::denies('width_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.widths.create');
    }

    public function store(StoreWidthRequest $request)
    {
        $width = Width::create($request->all());

        return redirect()->route('admin.widths.index');
    }

    public function edit(Width $width)
    {
        abort_if(Gate::denies('width_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.widths.edit', compact('width'));
    }

    public function update(UpdateWidthRequest $request, Width $width)
    {
        $width->update($request->all());

        return redirect()->route('admin.widths.index');
    }

    public function show(Width $width)
    {
        abort_if(Gate::denies('width_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.widths.show', compact('width'));
    }

    public function destroy(Width $width)
    {
        abort_if(Gate::denies('width_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $width->delete();

        return back();
    }

    public function massDestroy(MassDestroyWidthRequest $request)
    {
        Width::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
