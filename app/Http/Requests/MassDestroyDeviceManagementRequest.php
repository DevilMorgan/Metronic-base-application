<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\DeviceManagement;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDeviceManagementRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('device_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:device_managements,id',
]
    
}

}