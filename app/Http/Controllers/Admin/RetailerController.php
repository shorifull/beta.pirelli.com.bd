<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRetailerRequest;
use App\Http\Requests\StoreRetailerRequest;
use App\Http\Requests\UpdateRetailerRequest;
use App\Models\City;
use App\Models\Retailer;
use App\Models\VehicleType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RetailerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('retailer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $retailers = Retailer::with(['vehicle_type', 'city'])->get();

        return view('admin.retailers.index', compact('retailers'));
    }

    public function create()
    {
        abort_if(Gate::denies('retailer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicle_types = VehicleType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cities = City::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.retailers.create', compact('vehicle_types', 'cities'));
    }

    public function store(StoreRetailerRequest $request)
    {
        $retailer = Retailer::create($request->all());

        return redirect()->route('admin.retailers.index');
    }

    public function edit(Retailer $retailer)
    {
        abort_if(Gate::denies('retailer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicle_types = VehicleType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cities = City::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $retailer->load('vehicle_type', 'city');

        return view('admin.retailers.edit', compact('vehicle_types', 'cities', 'retailer'));
    }

    public function update(UpdateRetailerRequest $request, Retailer $retailer)
    {
        $retailer->update($request->all());

        return redirect()->route('admin.retailers.index');
    }

    public function show(Retailer $retailer)
    {
        abort_if(Gate::denies('retailer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $retailer->load('vehicle_type', 'city');

        return view('admin.retailers.show', compact('retailer'));
    }

    public function destroy(Retailer $retailer)
    {
        abort_if(Gate::denies('retailer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $retailer->delete();

        return back();
    }

    public function massDestroy(MassDestroyRetailerRequest $request)
    {
        Retailer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
