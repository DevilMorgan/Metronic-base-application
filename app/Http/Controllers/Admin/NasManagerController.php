<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNasManagerRequest;
use App\Http\Requests\StoreNasManagerRequest;
use App\Http\Requests\UpdateNasManagerRequest;
use App\Models\NasManager;
use App\Models\Team;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NasManagerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('nas_manager_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nasManagers = NasManager::with(['nas_sube', 'team'])->get();

        return view('admin.nasManagers.index', compact('nasManagers'));
    }

    public function create()
    {
        abort_if(Gate::denies('nas_manager_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nas_subes = Team::all()->pluck('sube_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.nasManagers.create', compact('nas_subes'));
    }

    public function store(StoreNasManagerRequest $request)
    {
        $nasManager = NasManager::create($request->all());

        return redirect()->route('admin.nas-managers.index');
    }

    public function edit(NasManager $nasManager)
    {
        abort_if(Gate::denies('nas_manager_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nas_subes = Team::all()->pluck('sube_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nasManager->load('nas_sube', 'team');

        return view('admin.nasManagers.edit', compact('nas_subes', 'nasManager'));
    }

    public function update(UpdateNasManagerRequest $request, NasManager $nasManager)
    {
        $nasManager->update($request->all());

        return redirect()->route('admin.nas-managers.index');
    }

    public function show(NasManager $nasManager)
    {
        abort_if(Gate::denies('nas_manager_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nasManager->load('nas_sube', 'team', 'stationNasStationManagements');

        return view('admin.nasManagers.show', compact('nasManager'));
    }

    public function destroy(NasManager $nasManager)
    {
        abort_if(Gate::denies('nas_manager_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nasManager->delete();

        return back();
    }

    public function massDestroy(MassDestroyNasManagerRequest $request)
    {
        NasManager::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
