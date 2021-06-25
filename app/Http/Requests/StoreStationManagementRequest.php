<?php

namespace App\Http\Requests;

use App\Models\StationManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStationManagementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('station_management_create');
    }

    public function rules()
    {
        return [
            'station_name' => [
                'string',
                'nullable',
            ],
            'station_status' => [
                'required',
            ],
            'station_alici_ip' => [
                'string',
                'nullable',
            ],
            'station_installation' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'station_contact_person' => [
                'string',
                'nullable',
            ],
            'station_contact_phone' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
