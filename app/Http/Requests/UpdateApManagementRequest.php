<?php

namespace App\Http\Requests;

use App\Models\ApManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateApManagementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ap_management_edit');
    }

    public function rules()
    {
        return [
            'ap_name' => [
                'string',
                'required',
            ],
            'ap_ip_address' => [
                'string',
                'nullable',
            ],
            'ap_username' => [
                'string',
                'nullable',
            ],
            'ap_ssh_port' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'ap_api_port' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'ap_vlan' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'ap_max_wlan_register' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'ap_max_pppoe' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'ap_switch_port_number' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'ap_installation_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
