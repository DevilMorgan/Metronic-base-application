<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\SwitchList;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySwitchListRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('switch_list_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:switch_lists,id',
]
    
}

}