<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApManagementRequest;
use App\Http\Requests\UpdateApManagementRequest;
use App\Http\Resources\Admin\ApManagementResource;
use App\Models\ApManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApManagementApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ap_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ApManagementResource(ApManagement::with(['ap_station', 'team'])->get());
    }

    public function store(StoreApManagementRequest $request)
    {
        $apManagement = ApManagement::create($request->all());

        return (new ApManagementResource($apManagement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ApManagement $apManagement)
    {
        abort_if(Gate::denies('ap_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ApManagementResource($apManagement->load(['ap_station', 'team']));
    }

    public function update(UpdateApManagementRequest $request, ApManagement $apManagement)
    {
        $apManagement->update($request->all());

        return (new ApManagementResource($apManagement))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ApManagement $apManagement)
    {
        abort_if(Gate::denies('ap_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $apManagement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
