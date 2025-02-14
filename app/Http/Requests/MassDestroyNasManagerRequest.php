<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\NasManager;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyNasManagerRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('nas_manager_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:nas_managers,id',
]
    
}

}