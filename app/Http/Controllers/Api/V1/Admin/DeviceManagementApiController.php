<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeviceManagementRequest;
use App\Http\Requests\UpdateDeviceManagementRequest;
use App\Http\Resources\Admin\DeviceManagementResource;
use App\Models\DeviceManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeviceManagementApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('device_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DeviceManagementResource(DeviceManagement::with(['team'])->get());
    }

    public function store(StoreDeviceManagementRequest $request)
    {
        $deviceManagement = DeviceManagement::create($request->all());

        return (new DeviceManagementResource($deviceManagement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DeviceManagement $deviceManagement)
    {
        abort_if(Gate::denies('device_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DeviceManagementResource($deviceManagement->load(['team']));
    }

    public function update(UpdateDeviceManagementRequest $request, DeviceManagement $deviceManagement)
    {
        $deviceManagement->update($request->all());

        return (new DeviceManagementResource($deviceManagement))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DeviceManagement $deviceManagement)
    {
        abort_if(Gate::denies('device_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deviceManagement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
