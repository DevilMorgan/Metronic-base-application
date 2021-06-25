<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubnetManagementRequest;
use App\Http\Requests\UpdateSubnetManagementRequest;
use App\Http\Resources\Admin\SubnetManagementResource;
use App\Models\SubnetManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubnetManagementApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('subnet_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubnetManagementResource(SubnetManagement::with(['team'])->get());
    }

    public function store(StoreSubnetManagementRequest $request)
    {
        $subnetManagement = SubnetManagement::create($request->all());

        return (new SubnetManagementResource($subnetManagement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SubnetManagement $subnetManagement)
    {
        abort_if(Gate::denies('subnet_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubnetManagementResource($subnetManagement->load(['team']));
    }

    public function update(UpdateSubnetManagementRequest $request, SubnetManagement $subnetManagement)
    {
        $subnetManagement->update($request->all());

        return (new SubnetManagementResource($subnetManagement))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SubnetManagement $subnetManagement)
    {
        abort_if(Gate::denies('subnet_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subnetManagement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
