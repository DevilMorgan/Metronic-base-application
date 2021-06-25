<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'ap_detay_ozet_access',
            ],
            [
                'id'    => 18,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 22,
                'title' => 'ap_management_create',
            ],
            [
                'id'    => 23,
                'title' => 'ap_management_edit',
            ],
            [
                'id'    => 24,
                'title' => 'ap_management_show',
            ],
            [
                'id'    => 25,
                'title' => 'ap_management_delete',
            ],
            [
                'id'    => 26,
                'title' => 'ap_management_access',
            ],
            [
                'id'    => 27,
                'title' => 'station_management_create',
            ],
            [
                'id'    => 28,
                'title' => 'station_management_edit',
            ],
            [
                'id'    => 29,
                'title' => 'station_management_show',
            ],
            [
                'id'    => 30,
                'title' => 'station_management_delete',
            ],
            [
                'id'    => 31,
                'title' => 'station_management_access',
            ],
            [
                'id'    => 32,
                'title' => 'abonelik_islemleri_access',
            ],
            [
                'id'    => 33,
                'title' => 'musteriler_create',
            ],
            [
                'id'    => 34,
                'title' => 'musteriler_edit',
            ],
            [
                'id'    => 35,
                'title' => 'musteriler_show',
            ],
            [
                'id'    => 36,
                'title' => 'musteriler_delete',
            ],
            [
                'id'    => 37,
                'title' => 'musteriler_access',
            ],
            [
                'id'    => 38,
                'title' => 'network_yonetimi_access',
            ],
            [
                'id'    => 39,
                'title' => 'station_yonet_access',
            ],
            [
                'id'    => 40,
                'title' => 'ap_yonetimi_access',
            ],
            [
                'id'    => 41,
                'title' => 'nas_yonetimi_access',
            ],
            [
                'id'    => 42,
                'title' => 'signalccq_management_access',
            ],
            [
                'id'    => 43,
                'title' => 'acs_server_management_access',
            ],
            [
                'id'    => 44,
                'title' => 'station_raporlari_access',
            ],
            [
                'id'    => 45,
                'title' => 'switch_management_access',
            ],
            [
                'id'    => 46,
                'title' => 'switch_list_create',
            ],
            [
                'id'    => 47,
                'title' => 'switch_list_edit',
            ],
            [
                'id'    => 48,
                'title' => 'switch_list_show',
            ],
            [
                'id'    => 49,
                'title' => 'switch_list_delete',
            ],
            [
                'id'    => 50,
                'title' => 'switch_list_access',
            ],
            [
                'id'    => 51,
                'title' => 'speed_test_management_access',
            ],
            [
                'id'    => 52,
                'title' => 'switch_yonet_access',
            ],
            [
                'id'    => 53,
                'title' => 'speed_test_raporlari_access',
            ],
            [
                'id'    => 54,
                'title' => 'device_management_create',
            ],
            [
                'id'    => 55,
                'title' => 'device_management_edit',
            ],
            [
                'id'    => 56,
                'title' => 'device_management_show',
            ],
            [
                'id'    => 57,
                'title' => 'device_management_delete',
            ],
            [
                'id'    => 58,
                'title' => 'device_management_access',
            ],
            [
                'id'    => 59,
                'title' => 'team_create',
            ],
            [
                'id'    => 60,
                'title' => 'team_edit',
            ],
            [
                'id'    => 61,
                'title' => 'team_show',
            ],
            [
                'id'    => 62,
                'title' => 'team_delete',
            ],
            [
                'id'    => 63,
                'title' => 'team_access',
            ],
            [
                'id'    => 64,
                'title' => 'ipam_managed_access',
            ],
            [
                'id'    => 65,
                'title' => 'subnet_management_create',
            ],
            [
                'id'    => 66,
                'title' => 'subnet_management_edit',
            ],
            [
                'id'    => 67,
                'title' => 'subnet_management_show',
            ],
            [
                'id'    => 68,
                'title' => 'subnet_management_delete',
            ],
            [
                'id'    => 69,
                'title' => 'subnet_management_access',
            ],
            [
                'id'    => 70,
                'title' => 'pool_management_radiu_create',
            ],
            [
                'id'    => 71,
                'title' => 'pool_management_radiu_edit',
            ],
            [
                'id'    => 72,
                'title' => 'pool_management_radiu_show',
            ],
            [
                'id'    => 73,
                'title' => 'pool_management_radiu_delete',
            ],
            [
                'id'    => 74,
                'title' => 'pool_management_radiu_access',
            ],
            [
                'id'    => 75,
                'title' => 'pool_management_mikrotik_create',
            ],
            [
                'id'    => 76,
                'title' => 'pool_management_mikrotik_edit',
            ],
            [
                'id'    => 77,
                'title' => 'pool_management_mikrotik_show',
            ],
            [
                'id'    => 78,
                'title' => 'pool_management_mikrotik_delete',
            ],
            [
                'id'    => 79,
                'title' => 'pool_management_mikrotik_access',
            ],
            [
                'id'    => 80,
                'title' => 'ap_manager_access',
            ],
            [
                'id'    => 81,
                'title' => 'signal_management_access',
            ],
            [
                'id'    => 82,
                'title' => 'frequency_manager_access',
            ],
            [
                'id'    => 83,
                'title' => 'signal_manager_access',
            ],
            [
                'id'    => 84,
                'title' => 'ipam_report_access',
            ],
            [
                'id'    => 85,
                'title' => 'merkezi_sistem_access',
            ],
            [
                'id'    => 86,
                'title' => 'sube_management_access',
            ],
            [
                'id'    => 87,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 88,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 89,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 90,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 91,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 92,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 93,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 94,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 95,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 96,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 97,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 98,
                'title' => 'task_create',
            ],
            [
                'id'    => 99,
                'title' => 'task_edit',
            ],
            [
                'id'    => 100,
                'title' => 'task_show',
            ],
            [
                'id'    => 101,
                'title' => 'task_delete',
            ],
            [
                'id'    => 102,
                'title' => 'task_access',
            ],
            [
                'id'    => 103,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 104,
                'title' => 'nas_manager_create',
            ],
            [
                'id'    => 105,
                'title' => 'nas_manager_edit',
            ],
            [
                'id'    => 106,
                'title' => 'nas_manager_show',
            ],
            [
                'id'    => 107,
                'title' => 'nas_manager_delete',
            ],
            [
                'id'    => 108,
                'title' => 'nas_manager_access',
            ],
            [
                'id'    => 109,
                'title' => 'performans_report_access',
            ],
            [
                'id'    => 110,
                'title' => 'sube_sikayet_access',
            ],
            [
                'id'    => 111,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
