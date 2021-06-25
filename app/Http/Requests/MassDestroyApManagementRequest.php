<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\ApManagement;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyApManagementRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('ap_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:ap_managements,id',
]
    
}

}