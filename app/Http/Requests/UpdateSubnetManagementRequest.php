<?php

namespace App\Http\Requests;

use App\Models\SubnetManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSubnetManagementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('subnet_management_edit');
    }

    public function rules()
    {
        return [
            'subnet_name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
