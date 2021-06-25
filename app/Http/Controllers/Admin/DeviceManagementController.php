<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDeviceManagementRequest;
use App\Http\Requests\StoreDeviceManagementRequest;
use App\Http\Requests\UpdateDeviceManagementRequest;
use App\Models\DeviceManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeviceManagementController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('device_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deviceManagements = DeviceManagement::with(['team'])->get();

        return view('admin.deviceManagements.index', compact('deviceManagements'));
    }

    public function create()
    {
        abort_if(Gate::denies('device_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.deviceManagements.create');
    }

    public function store(StoreDeviceManagementRequest $request)
    {
        $deviceManagement = DeviceManagement::create($request->all());

        return redirect()->route('admin.device-managements.index');
    }

    public function edit(DeviceManagement $deviceManagement)
    {
        abort_if(Gate::denies('device_management_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deviceManagement->load('team');

        return view('admin.deviceManagements.edit', compact('deviceManagement'));
    }

    public function update(UpdateDeviceManagementRequest $request, DeviceManagement $deviceManagement)
    {
        $deviceManagement->update($request->all());

        return redirect()->route('admin.device-managements.index');
    }

    public function show(DeviceManagement $deviceManagement)
    {
        abort_if(Gate::denies('device_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deviceManagement->load('team');

        return view('admin.deviceManagements.show', compact('deviceManagement'));
    }

    public function destroy(DeviceManagement $deviceManagement)
    {
        abort_if(Gate::denies('device_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deviceManagement->delete();

        return back();
    }

    public function massDestroy(MassDestroyDeviceManagementRequest $request)
    {
        DeviceManagement::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
