<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePoolManagementMikrotikRequest;
use App\Http\Requests\UpdatePoolManagementMikrotikRequest;
use App\Http\Resources\Admin\PoolManagementMikrotikResource;
use App\Models\PoolManagementMikrotik;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PoolManagementMikrotikApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pool_management_mikrotik_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PoolManagementMikrotikResource(PoolManagementMikrotik::with(['team'])->get());
    }

    public function store(StorePoolManagementMikrotikRequest $request)
    {
        $poolManagementMikrotik = PoolManagementMikrotik::create($request->all());

        return (new PoolManagementMikrotikResource($poolManagementMikrotik))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PoolManagementMikrotik $poolManagementMikrotik)
    {
        abort_if(Gate::denies('pool_management_mikrotik_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PoolManagementMikrotikResource($poolManagementMikrotik->load(['team']));
    }

    public function update(UpdatePoolManagementMikrotikRequest $request, PoolManagementMikrotik $poolManagementMikrotik)
    {
        $poolManagementMikrotik->update($request->all());

        return (new PoolManagementMikrotikResource($poolManagementMikrotik))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PoolManagementMikrotik $poolManagementMikrotik)
    {
        abort_if(Gate::denies('pool_management_mikrotik_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $poolManagementMikrotik->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
