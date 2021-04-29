<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySocialRequest;
use App\Http\Requests\StoreSocialRequest;
use App\Http\Requests\UpdateSocialRequest;
use App\Models\Social;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SocialController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('social_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $socials = Social::all();

        return view('admin.socials.index', compact('socials'));
    }

    public function create()
    {
        abort_if(Gate::denies('social_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.socials.create');
    }

    public function store(StoreSocialRequest $request)
    {
        $social = Social::create($request->all());

        return redirect()->route('admin.socials.index');
    }

    public function edit(Social $social)
    {
        abort_if(Gate::denies('social_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.socials.edit', compact('social'));
    }

    public function update(UpdateSocialRequest $request, Social $social)
    {
        $social->update($request->all());

        return redirect()->route('admin.socials.index');
    }

    public function show(Social $social)
    {
        abort_if(Gate::denies('social_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.socials.show', compact('social'));
    }

    public function destroy(Social $social)
    {
        abort_if(Gate::denies('social_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $social->delete();

        return back();
    }

    public function massDestroy(MassDestroySocialRequest $request)
    {
        Social::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
