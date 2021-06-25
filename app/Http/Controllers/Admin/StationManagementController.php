<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStationManagementRequest;
use App\Http\Requests\StoreStationManagementRequest;
use App\Http\Requests\UpdateStationManagementRequest;
use App\Models\NasManager;
use App\Models\StationManagement;
use App\Models\Team;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StationManagementController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('station_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stationManagements = StationManagement::with(['station_nas', 'station_sube', 'team'])->get();

        return view('admin.stationManagements.index', compact('stationManagements'));
    }

    public function create()
    {
        abort_if(Gate::denies('station_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $station_nas = NasManager::all()->pluck('nas_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $station_subes = Team::all()->pluck('sube_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.stationManagements.create', compact('station_nas', 'station_subes'));
    }

    public function store(StoreStationManagementRequest $request)
    {
        $stationManagement = StationManagement::create($request->all());

        return redirect()->route('admin.station-managements.index');
    }

    public function edit(StationManagement $stationManagement)
    {
        abort_if(Gate::denies('station_management_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $station_nas = NasManager::all()->pluck('nas_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $station_subes = Team::all()->pluck('sube_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $stationManagement->load('station_nas', 'station_sube', 'team');

        return view('admin.stationManagements.edit', compact('station_nas', 'station_subes', 'stationManagement'));
    }

    public function update(UpdateStationManagementRequest $request, StationManagement $stationManagement)
    {
        $stationManagement->update($request->all());

        return redirect()->route('admin.station-managements.index');
    }

    public function show(StationManagement $stationManagement)
    {
        abort_if(Gate::denies('station_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stationManagement->load('station_nas', 'station_sube', 'team', 'apStationApManagements');

        return view('admin.stationManagements.show', compact('stationManagement'));
    }

    public function destroy(StationManagement $stationManagement)
    {
        abort_if(Gate::denies('station_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stationManagement->delete();

        return back();
    }

    public function massDestroy(MassDestroyStationManagementRequest $request)
    {
        StationManagement::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
