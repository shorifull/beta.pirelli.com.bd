<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFooterRequest;
use App\Http\Requests\StoreFooterRequest;
use App\Http\Requests\UpdateFooterRequest;
use App\Models\Footer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FooterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('footer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $footers = Footer::all();

        return view('admin.footers.index', compact('footers'));
    }

    public function create()
    {
        abort_if(Gate::denies('footer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.footers.create');
    }

    public function store(StoreFooterRequest $request)
    {
        $footer = Footer::create($request->all());

        return redirect()->route('admin.footers.index');
    }

    public function edit(Footer $footer)
    {
        abort_if(Gate::denies('footer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.footers.edit', compact('footer'));
    }

    public function update(UpdateFooterRequest $request, Footer $footer)
    {
        $footer->update($request->all());

        return redirect()->route('admin.footers.index');
    }

    public function show(Footer $footer)
    {
        abort_if(Gate::denies('footer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.footers.show', compact('footer'));
    }

    public function destroy(Footer $footer)
    {
        abort_if(Gate::denies('footer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $footer->delete();

        return back();
    }

    public function massDestroy(MassDestroyFooterRequest $request)
    {
        Footer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
