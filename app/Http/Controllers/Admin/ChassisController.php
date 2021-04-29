<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyChassisRequest;
use App\Http\Requests\StoreChassisRequest;
use App\Http\Requests\UpdateChassisRequest;
use App\Models\Chassis;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChassisController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('chassis_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chassis = Chassis::all();

        return view('admin.chassis.index', compact('chassis'));
    }

    public function create()
    {
        abort_if(Gate::denies('chassis_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.chassis.create');
    }

    public function store(StoreChassisRequest $request)
    {
        $chassis = Chassis::create($request->all());

        return redirect()->route('admin.chassis.index');
    }

    public function edit(Chassis $chassis)
    {
        abort_if(Gate::denies('chassis_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.chassis.edit', compact('chassis'));
    }

    public function update(UpdateChassisRequest $request, Chassis $chassis)
    {
        $chassis->update($request->all());

        return redirect()->route('admin.chassis.index');
    }

    public function show(Chassis $chassis)
    {
        abort_if(Gate::denies('chassis_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.chassis.show', compact('chassis'));
    }

    public function destroy(Chassis $chassis)
    {
        abort_if(Gate::denies('chassis_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chassis->delete();

        return back();
    }

    public function massDestroy(MassDestroyChassisRequest $request)
    {
        Chassis::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
