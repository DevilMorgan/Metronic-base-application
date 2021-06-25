<?php

namespace App\Http\Requests;

use App\Models\NasManager;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNasManagerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('nas_manager_edit');
    }

    public function rules()
    {
        return [
            'nas_name' => [
                'string',
                'required',
            ],
            'nas_ip_address' => [
                'string',
                'nullable',
            ],
            'nas_username' => [
                'string',
                'nullable',
            ],
            'nas_ssh_port' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'nas_api_port' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
