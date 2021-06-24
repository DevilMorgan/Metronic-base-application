<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNetworkAlertRequest;
use App\Http\Requests\StoreNetworkAlertRequest;
use App\Http\Requests\UpdateNetworkAlertRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NetworkAlertController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('network_alert_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.networkAlerts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('network_alert_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.networkAlerts.create');
    }

    public function store(StoreNetworkAlertRequest $request)
    {
        $networkAlert = NetworkAlert::create($request->all());

        return redirect()->route('admin.network-alerts.index');
    }

    public function edit(NetworkAlert $networkAlert)
    {
        abort_if(Gate::denies('network_alert_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.networkAlerts.edit', compact('networkAlert'));
    }

    public function update(UpdateNetworkAlertRequest $request, NetworkAlert $networkAlert)
    {
        $networkAlert->update($request->all());

        return redirect()->route('admin.network-alerts.index');
    }

    public function show(NetworkAlert $networkAlert)
    {
        abort_if(Gate::denies('network_alert_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.networkAlerts.show', compact('networkAlert'));
    }

    public function destroy(NetworkAlert $networkAlert)
    {
        abort_if(Gate::denies('network_alert_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $networkAlert->delete();

        return back();
    }

    public function massDestroy(MassDestroyNetworkAlertRequest $request)
    {
        NetworkAlert::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
