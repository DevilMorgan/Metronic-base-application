<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySubnetManagementRequest;
use App\Http\Requests\StoreSubnetManagementRequest;
use App\Http\Requests\UpdateSubnetManagementRequest;
use App\Models\SubnetManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubnetManagementController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('subnet_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subnetManagements = SubnetManagement::with(['team'])->get();

        return view('admin.subnetManagements.index', compact('subnetManagements'));
    }

    public function create()
    {
        abort_if(Gate::denies('subnet_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.subnetManagements.create');
    }

    public function store(StoreSubnetManagementRequest $request)
    {
        $subnetManagement = SubnetManagement::create($request->all());

        return redirect()->route('admin.subnet-managements.index');
    }

    public function edit(SubnetManagement $subnetManagement)
    {
        abort_if(Gate::denies('subnet_management_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subnetManagement->load('team');

        return view('admin.subnetManagements.edit', compact('subnetManagement'));
    }

    public function update(UpdateSubnetManagementRequest $request, SubnetManagement $subnetManagement)
    {
        $subnetManagement->update($request->all());

        return redirect()->route('admin.subnet-managements.index');
    }

    public function show(SubnetManagement $subnetManagement)
    {
        abort_if(Gate::denies('subnet_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subnetManagement->load('team');

        return view('admin.subnetManagements.show', compact('subnetManagement'));
    }

    public function destroy(SubnetManagement $subnetManagement)
    {
        abort_if(Gate::denies('subnet_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subnetManagement->delete();

        return back();
    }

    public function massDestroy(MassDestroySubnetManagementRequest $request)
    {
        SubnetManagement::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
