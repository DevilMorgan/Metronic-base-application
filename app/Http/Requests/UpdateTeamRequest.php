<?php

namespace App\Http\Requests;

use App\Models\Team;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTeamRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('team_edit');
    }

    public function rules()
    {
        return [
            'sube_name' => [
                'string',
                'nullable',
            ],
            'nas_prefix' => [
                'string',
                'min:2',
                'max:6',
                'nullable',
            ],
            'ip_block_prfeix' => [
                'string',
                'nullable',
            ],
            'ticket_prefix' => [
                'string',
                'min:2',
                'max:6',
                'nullable',
            ],
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
