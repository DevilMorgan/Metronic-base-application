<?php

namespace App\Http\Requests;

use App\Models\PoolManagementMikrotik;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePoolManagementMikrotikRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pool_management_mikrotik_edit');
    }

    public function rules()
    {
        return [
            'mikrotik_pool_name' => [
                'string',
                'nullable',
            ],
            'mikrotik_pool_range' => [
                'string',
                'nullable',
            ],
        ];
    }
}
