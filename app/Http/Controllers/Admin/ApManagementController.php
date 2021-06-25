<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyApManagementRequest;
use App\Http\Requests\StoreApManagementRequest;
use App\Http\Requests\UpdateApManagementRequest;
use App\Models\ApManagement;
use App\Models\StationManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApManagementController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ap_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $apManagements = ApManagement::with(['ap_station', 'team'])->get();

        return view('admin.apManagements.index', compact('apManagements'));
    }

    public function create()
    {
        abort_if(Gate::denies('ap_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ap_stations = StationManagement::all()->pluck('station_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.apManagements.create', compact('ap_stations'));
    }

    public function store(StoreApManagementRequest $request)
    {
        $apManagement = ApManagement::create($request->all());

        return redirect()->route('admin.ap-managements.index');
    }

    public function edit(ApManagement $apManagement)
    {
        abort_if(Gate::denies('ap_management_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ap_stations = StationManagement::all()->pluck('station_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $apManagement->load('ap_station', 'team');

        return view('admin.apManagements.edit', compact('ap_stations', 'apManagement'));
    }

    public function update(UpdateApManagementRequest $request, ApManagement $apManagement)
    {
        $apManagement->update($request->all());

        return redirect()->route('admin.ap-managements.index');
    }

    public function show(ApManagement $apManagement)
    {
        abort_if(Gate::denies('ap_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $apManagement->load('ap_station', 'team');

        return view('admin.apManagements.show', compact('apManagement'));
    }

    public function destroy(ApManagement $apManagement)
    {
        abort_if(Gate::denies('ap_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $apManagement->delete();

        return back();
    }

    public function massDestroy(MassDestroyApManagementRequest $request)
    {
        ApManagement::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
