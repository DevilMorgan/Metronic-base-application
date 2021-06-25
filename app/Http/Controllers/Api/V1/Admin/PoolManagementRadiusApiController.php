<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePoolManagementRadiuRequest;
use App\Http\Requests\UpdatePoolManagementRadiuRequest;
use App\Http\Resources\Admin\PoolManagementRadiuResource;
use App\Models\PoolManagementRadiu;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PoolManagementRadiusApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pool_management_radiu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PoolManagementRadiuResource(PoolManagementRadiu::with(['radius_ip_nas', 'team'])->get());
    }

    public function store(StorePoolManagementRadiuRequest $request)
    {
        $poolManagementRadiu = PoolManagementRadiu::create($request->all());

        return (new PoolManagementRadiuResource($poolManagementRadiu))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PoolManagementRadiu $poolManagementRadiu)
    {
        abort_if(Gate::denies('pool_management_radiu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PoolManagementRadiuResource($poolManagementRadiu->load(['radius_ip_nas', 'team']));
    }

    public function update(UpdatePoolManagementRadiuRequest $request, PoolManagementRadiu $poolManagementRadiu)
    {
        $poolManagementRadiu->update($request->all());

        return (new PoolManagementRadiuResource($poolManagementRadiu))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PoolManagementRadiu $poolManagementRadiu)
    {
        abort_if(Gate::denies('pool_management_radiu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $poolManagementRadiu->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
