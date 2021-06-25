<?php

namespace App\Http\Requests;

use App\Models\SwitchList;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSwitchListRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('switch_list_create');
    }

    public function rules()
    {
        return [
            'switch_name' => [
                'string',
                'nullable',
            ],
            'switch_ip_address' => [
                'string',
                'nullable',
            ],
            'switch_port_sayisi' => [
                'string',
                'min:5',
                'max:48',
                'nullable',
            ],
            'switch_notlar' => [
                'string',
                'nullable',
            ],
        ];
    }
}
