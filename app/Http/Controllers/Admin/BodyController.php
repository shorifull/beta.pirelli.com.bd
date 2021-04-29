<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBodyRequest;
use App\Http\Requests\StoreBodyRequest;
use App\Http\Requests\UpdateBodyRequest;
use App\Models\Body;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BodyController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('body_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bodies = Body::all();

        return view('admin.bodies.index', compact('bodies'));
    }

    public function create()
    {
        abort_if(Gate::denies('body_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bodies.create');
    }

    public function store(StoreBodyRequest $request)
    {
        $body = Body::create($request->all());

        return redirect()->route('admin.bodies.index');
    }

    public function edit(Body $body)
    {
        abort_if(Gate::denies('body_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bodies.edit', compact('body'));
    }

    public function update(UpdateBodyRequest $request, Body $body)
    {
        $body->update($request->all());

        return redirect()->route('admin.bodies.index');
    }

    public function show(Body $body)
    {
        abort_if(Gate::denies('body_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bodies.show', compact('body'));
    }

    public function destroy(Body $body)
    {
        abort_if(Gate::denies('body_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $body->delete();

        return back();
    }

    public function massDestroy(MassDestroyBodyRequest $request)
    {
        Body::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
