<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPageMenuRequest;
use App\Http\Requests\StorePageMenuRequest;
use App\Http\Requests\UpdatePageMenuRequest;
use App\Models\Page;
use App\Models\PageMenu;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PageMenuController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('page_menu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pageMenus = PageMenu::with(['page'])->get();

        return view('admin.pageMenus.index', compact('pageMenus'));
    }

    public function create()
    {
        abort_if(Gate::denies('page_menu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::all()->pluck('page_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pageMenus.create', compact('pages'));
    }

    public function store(StorePageMenuRequest $request)
    {
        $pageMenu = PageMenu::create($request->all());

        return redirect()->route('admin.page-menus.index');
    }

    public function edit(PageMenu $pageMenu)
    {
        abort_if(Gate::denies('page_menu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::all()->pluck('page_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pageMenu->load('page');

        return view('admin.pageMenus.edit', compact('pages', 'pageMenu'));
    }

    public function update(UpdatePageMenuRequest $request, PageMenu $pageMenu)
    {
        $pageMenu->update($request->all());

        return redirect()->route('admin.page-menus.index');
    }

    public function show(PageMenu $pageMenu)
    {
        abort_if(Gate::denies('page_menu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pageMenu->load('page');

        return view('admin.pageMenus.show', compact('pageMenu'));
    }

    public function destroy(PageMenu $pageMenu)
    {
        abort_if(Gate::denies('page_menu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pageMenu->delete();

        return back();
    }

    public function massDestroy(MassDestroyPageMenuRequest $request)
    {
        PageMenu::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
