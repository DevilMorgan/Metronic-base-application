<?php

namespace App\Http\Requests;

use App\Models\StationManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStationManagementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('station_management_edit');
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
            'station_capacity_speed' => [
                'string',
                'min:2',
                'max:5',
                'nullable',
            ],
            'station_max_ap' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'station_max_cpe' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'station_max_pppoe' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'station_switch_port_number' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'station_maps_latitude' => [
                'string',
                'nullable',
            ],
            'station_maps_longitude' => [
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
