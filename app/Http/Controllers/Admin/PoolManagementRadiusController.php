<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPoolManagementRadiuRequest;
use App\Http\Requests\StorePoolManagementRadiuRequest;
use App\Http\Requests\UpdatePoolManagementRadiuRequest;
use App\Models\NasManager;
use App\Models\PoolManagementRadiu;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PoolManagementRadiusController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pool_management_radiu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $poolManagementRadius = PoolManagementRadiu::with(['radius_ip_nas', 'team'])->get();

        return view('admin.poolManagementRadius.index', compact('poolManagementRadius'));
    }

    public function create()
    {
        abort_if(Gate::denies('pool_management_radiu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $radius_ip_nas = NasManager::all()->pluck('nas_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.poolManagementRadius.create', compact('radius_ip_nas'));
    }

    public function store(StorePoolManagementRadiuRequest $request)
    {
        $poolManagementRadiu = PoolManagementRadiu::create($request->all());

        return redirect()->route('admin.pool-management-radius.index');
    }

    public function edit(PoolManagementRadiu $poolManagementRadiu)
    {
        abort_if(Gate::denies('pool_management_radiu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $radius_ip_nas = NasManager::all()->pluck('nas_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $poolManagementRadiu->load('radius_ip_nas', 'team');

        return view('admin.poolManagementRadius.edit', compact('radius_ip_nas', 'poolManagementRadiu'));
    }

    public function update(UpdatePoolManagementRadiuRequest $request, PoolManagementRadiu $poolManagementRadiu)
    {
        $poolManagementRadiu->update($request->all());

        return redirect()->route('admin.pool-management-radius.index');
    }

    public function show(PoolManagementRadiu $poolManagementRadiu)
    {
        abort_if(Gate::denies('pool_management_radiu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $poolManagementRadiu->load('radius_ip_nas', 'team');

        return view('admin.poolManagementRadius.show', compact('poolManagementRadiu'));
    }

    public function destroy(PoolManagementRadiu $poolManagementRadiu)
    {
        abort_if(Gate::denies('pool_management_radiu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $poolManagementRadiu->delete();

        return back();
    }

    public function massDestroy(MassDestroyPoolManagementRadiuRequest $request)
    {
        PoolManagementRadiu::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
