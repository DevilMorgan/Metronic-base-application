<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApManagerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ap_manager_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.apManagers.index');
    }
}
