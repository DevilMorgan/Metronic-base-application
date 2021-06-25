<?php

namespace App\Http\Requests;

use App\Models\DeviceManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDeviceManagementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('device_management_edit');
    }

    public function rules()
    {
        return [
            'ap_mikrotik_default_username' => [
                'string',
                'nullable',
            ],
            'ap_mikrotik_default_password' => [
                'string',
                'nullable',
            ],
            'mikrotik_api_default_port' => [
                'string',
                'nullable',
            ],
            'ap_mikrotik_default_ssh' => [
                'string',
                'nullable',
            ],
        ];
    }
}
