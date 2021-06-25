<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSwitchListRequest;
use App\Http\Requests\UpdateSwitchListRequest;
use App\Http\Resources\Admin\SwitchListResource;
use App\Models\SwitchList;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SwitchListApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('switch_list_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SwitchListResource(SwitchList::with(['team'])->get());
    }

    public function store(StoreSwitchListRequest $request)
    {
        $switchList = SwitchList::create($request->all());

        return (new SwitchListResource($switchList))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SwitchList $switchList)
    {
        abort_if(Gate::denies('switch_list_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SwitchListResource($switchList->load(['team']));
    }

    public function update(UpdateSwitchListRequest $request, SwitchList $switchList)
    {
        $switchList->update($request->all());

        return (new SwitchListResource($switchList))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SwitchList $switchList)
    {
        abort_if(Gate::denies('switch_list_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $switchList->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
