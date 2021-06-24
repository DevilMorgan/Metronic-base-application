<?php

namespace Database\Seeders;

use App\Models\CrmStatus;
use Illuminate\Database\Seeder;

class CrmStatusTableSeeder extends Seeder
{
    public function run()
    {
        $crmStatuses = [
            [
                'id'         => 1,
                'name'       => 'Lead',
                'created_at' => '2021-06-16 03:22:28',
                'updated_at' => '2021-06-16 03:22:28',
            ],
            [
                'id'         => 2,
                'name'       => 'Customer',
                'created_at' => '2021-06-16 03:22:28',
                'updated_at' => '2021-06-16 03:22:28',
            ],
            [
                'id'         => 3,
                'name'       => 'Partner',
                'created_at' => '2021-06-16 03:22:28',
                'updated_at' => '2021-06-16 03:22:28',
            ],
        ];

        CrmStatus::insert($crmStatuses);
    }
}
