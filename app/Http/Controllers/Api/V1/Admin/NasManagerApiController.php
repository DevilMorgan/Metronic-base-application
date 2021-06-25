<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNasManagerRequest;
use App\Http\Requests\UpdateNasManagerRequest;
use App\Http\Resources\Admin\NasManagerResource;
use App\Models\NasManager;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NasManagerApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('nas_manager_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NasManagerResource(NasManager::with(['nas_sube', 'team'])->get());
    }

    public function store(StoreNasManagerRequest $request)
    {
        $nasManager = NasManager::create($request->all());

        return (new NasManagerResource($nasManager))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(NasManager $nasManager)
    {
        abort_if(Gate::denies('nas_manager_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NasManagerResource($nasManager->load(['nas_sube', 'team']));
    }

    public function update(UpdateNasManagerRequest $request, NasManager $nasManager)
    {
        $nasManager->update($request->all());

        return (new NasManagerResource($nasManager))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(NasManager $nasManager)
    {
        abort_if(Gate::denies('nas_manager_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nasManager->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
