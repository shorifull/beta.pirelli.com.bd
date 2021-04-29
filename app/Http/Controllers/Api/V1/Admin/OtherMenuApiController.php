<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOtherMenuRequest;
use App\Http\Requests\UpdateOtherMenuRequest;
use App\Http\Resources\Admin\OtherMenuResource;
use App\Models\OtherMenu;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OtherMenuApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('other_menu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OtherMenuResource(OtherMenu::all());
    }

    public function store(StoreOtherMenuRequest $request)
    {
        $otherMenu = OtherMenu::create($request->all());

        return (new OtherMenuResource($otherMenu))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OtherMenu $otherMenu)
    {
        abort_if(Gate::denies('other_menu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OtherMenuResource($otherMenu);
    }

    public function update(UpdateOtherMenuRequest $request, OtherMenu $otherMenu)
    {
        $otherMenu->update($request->all());

        return (new OtherMenuResource($otherMenu))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OtherMenu $otherMenu)
    {
        abort_if(Gate::denies('other_menu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $otherMenu->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
