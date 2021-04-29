<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePageMenuRequest;
use App\Http\Requests\UpdatePageMenuRequest;
use App\Http\Resources\Admin\PageMenuResource;
use App\Models\PageMenu;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PageMenuApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('page_menu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PageMenuResource(PageMenu::with(['page'])->get());
    }

    public function store(StorePageMenuRequest $request)
    {
        $pageMenu = PageMenu::create($request->all());

        return (new PageMenuResource($pageMenu))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PageMenu $pageMenu)
    {
        abort_if(Gate::denies('page_menu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PageMenuResource($pageMenu->load(['page']));
    }

    public function update(UpdatePageMenuRequest $request, PageMenu $pageMenu)
    {
        $pageMenu->update($request->all());

        return (new PageMenuResource($pageMenu))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PageMenu $pageMenu)
    {
        abort_if(Gate::denies('page_menu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pageMenu->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
