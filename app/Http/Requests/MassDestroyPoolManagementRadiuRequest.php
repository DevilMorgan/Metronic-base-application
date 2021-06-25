<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\PoolManagementRadiu;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPoolManagementRadiuRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('pool_management_radiu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:pool_management_radius,id',
]
    
}

}