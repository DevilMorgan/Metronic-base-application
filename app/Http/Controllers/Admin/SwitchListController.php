<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySwitchListRequest;
use App\Http\Requests\StoreSwitchListRequest;
use App\Http\Requests\UpdateSwitchListRequest;
use App\Models\SwitchList;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SwitchListController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('switch_list_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $switchLists = SwitchList::with(['team'])->get();

        return view('admin.switchLists.index', compact('switchLists'));
    }

    public function create()
    {
        abort_if(Gate::denies('switch_list_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.switchLists.create');
    }

    public function store(StoreSwitchListRequest $request)
    {
        $switchList = SwitchList::create($request->all());

        return redirect()->route('admin.switch-lists.index');
    }

    public function edit(SwitchList $switchList)
    {
        abort_if(Gate::denies('switch_list_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $switchList->load('team');

        return view('admin.switchLists.edit', compact('switchList'));
    }

    public function update(UpdateSwitchListRequest $request, SwitchList $switchList)
    {
        $switchList->update($request->all());

        return redirect()->route('admin.switch-lists.index');
    }

    public function show(SwitchList $switchList)
    {
        abort_if(Gate::denies('switch_list_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $switchList->load('team');

        return view('admin.switchLists.show', compact('switchList'));
    }

    public function destroy(SwitchList $switchList)
    {
        abort_if(Gate::denies('switch_list_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $switchList->delete();

        return back();
    }

    public function massDestroy(MassDestroySwitchListRequest $request)
    {
        SwitchList::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
