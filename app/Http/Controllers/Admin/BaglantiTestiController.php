<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBaglantiTestiRequest;
use App\Http\Requests\StoreBaglantiTestiRequest;
use App\Http\Requests\UpdateBaglantiTestiRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BaglantiTestiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('baglanti_testi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.baglantiTestis.index');
    }

    public function create()
    {
        abort_if(Gate::denies('baglanti_testi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.baglantiTestis.create');
    }

    public function store(StoreBaglantiTestiRequest $request)
    {
        $baglantiTesti = BaglantiTesti::create($request->all());

        return redirect()->route('admin.baglanti-testis.index');
    }

    public function edit(BaglantiTesti $baglantiTesti)
    {
        abort_if(Gate::denies('baglanti_testi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.baglantiTestis.edit', compact('baglantiTesti'));
    }

    public function update(UpdateBaglantiTestiRequest $request, BaglantiTesti $baglantiTesti)
    {
        $baglantiTesti->update($request->all());

        return redirect()->route('admin.baglanti-testis.index');
    }

    public function show(BaglantiTesti $baglantiTesti)
    {
        abort_if(Gate::denies('baglanti_testi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.baglantiTestis.show', compact('baglantiTesti'));
    }

    public function destroy(BaglantiTesti $baglantiTesti)
    {
        abort_if(Gate::denies('baglanti_testi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $baglantiTesti->delete();

        return back();
    }

    public function massDestroy(MassDestroyBaglantiTestiRequest $request)
    {
        BaglantiTesti::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
