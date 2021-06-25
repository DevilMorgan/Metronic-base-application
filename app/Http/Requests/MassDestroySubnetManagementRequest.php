<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\SubnetManagement;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySubnetManagementRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('subnet_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:subnet_managements,id',
]
    
}

}