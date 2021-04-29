<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOtherMenuRequest;
use App\Http\Requests\StoreOtherMenuRequest;
use App\Http\Requests\UpdateOtherMenuRequest;
use App\Models\OtherMenu;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OtherMenuController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('other_menu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $otherMenus = OtherMenu::all();

        return view('admin.otherMenus.index', compact('otherMenus'));
    }

    public function create()
    {
        abort_if(Gate::denies('other_menu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.otherMenus.create');
    }

    public function store(StoreOtherMenuRequest $request)
    {
        $otherMenu = OtherMenu::create($request->all());

        return redirect()->route('admin.other-menus.index');
    }

    public function edit(OtherMenu $otherMenu)
    {
        abort_if(Gate::denies('other_menu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.otherMenus.edit', compact('otherMenu'));
    }

    public function update(UpdateOtherMenuRequest $request, OtherMenu $otherMenu)
    {
        $otherMenu->update($request->all());

        return redirect()->route('admin.other-menus.index');
    }

    public function show(OtherMenu $otherMenu)
    {
        abort_if(Gate::denies('other_menu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.otherMenus.show', compact('otherMenu'));
    }

    public function destroy(OtherMenu $otherMenu)
    {
        abort_if(Gate::denies('other_menu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $otherMenu->delete();

        return back();
    }

    public function massDestroy(MassDestroyOtherMenuRequest $request)
    {
        OtherMenu::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
