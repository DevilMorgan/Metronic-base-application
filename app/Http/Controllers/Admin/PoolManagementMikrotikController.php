<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPoolManagementMikrotikRequest;
use App\Http\Requests\StorePoolManagementMikrotikRequest;
use App\Http\Requests\UpdatePoolManagementMikrotikRequest;
use App\Models\PoolManagementMikrotik;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PoolManagementMikrotikController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pool_management_mikrotik_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $poolManagementMikrotiks = PoolManagementMikrotik::with(['team'])->get();

        return view('admin.poolManagementMikrotiks.index', compact('poolManagementMikrotiks'));
    }

    public function create()
    {
        abort_if(Gate::denies('pool_management_mikrotik_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.poolManagementMikrotiks.create');
    }

    public function store(StorePoolManagementMikrotikRequest $request)
    {
        $poolManagementMikrotik = PoolManagementMikrotik::create($request->all());

        return redirect()->route('admin.pool-management-mikrotiks.index');
    }

    public function edit(PoolManagementMikrotik $poolManagementMikrotik)
    {
        abort_if(Gate::denies('pool_management_mikrotik_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $poolManagementMikrotik->load('team');

        return view('admin.poolManagementMikrotiks.edit', compact('poolManagementMikrotik'));
    }

    public function update(UpdatePoolManagementMikrotikRequest $request, PoolManagementMikrotik $poolManagementMikrotik)
    {
        $poolManagementMikrotik->update($request->all());

        return redirect()->route('admin.pool-management-mikrotiks.index');
    }

    public function show(PoolManagementMikrotik $poolManagementMikrotik)
    {
        abort_if(Gate::denies('pool_management_mikrotik_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $poolManagementMikrotik->load('team');

        return view('admin.poolManagementMikrotiks.show', compact('poolManagementMikrotik'));
    }

    public function destroy(PoolManagementMikrotik $poolManagementMikrotik)
    {
        abort_if(Gate::denies('pool_management_mikrotik_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $poolManagementMikrotik->delete();

        return back();
    }

    public function massDestroy(MassDestroyPoolManagementMikrotikRequest $request)
    {
        PoolManagementMikrotik::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
