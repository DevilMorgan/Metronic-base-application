<?php

namespace App\Http\Requests;

use App\Models\PoolManagementRadiu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePoolManagementRadiuRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pool_management_radiu_create');
    }

    public function rules()
    {
        return [
            'radius_pool_name' => [
                'string',
                'nullable',
            ],
            'ip_ranges' => [
                'string',
                'nullable',
            ],
        ];
    }
}
