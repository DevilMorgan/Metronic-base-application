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
                'title' => 'team_create',
            ],
            [
                'id'    => 19,
                'title' => 'team_edit',
            ],
            [
                'id'    => 20,
                'title' => 'team_show',
            ],
            [
                'id'    => 21,
                'title' => 'team_delete',
            ],
            [
                'id'    => 22,
                'title' => 'team_access',
            ],
            [
                'id'    => 23,
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => 24,
                'title' => 'crm_status_create',
            ],
            [
                'id'    => 25,
                'title' => 'crm_status_edit',
            ],
            [
                'id'    => 26,
                'title' => 'crm_status_show',
            ],
            [
                'id'    => 27,
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => 28,
                'title' => 'crm_status_access',
            ],
            [
                'id'    => 29,
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => 30,
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => 31,
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => 32,
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => 33,
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => 34,
                'title' => 'crm_note_create',
            ],
            [
                'id'    => 35,
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => 36,
                'title' => 'crm_note_show',
            ],
            [
                'id'    => 37,
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => 38,
                'title' => 'crm_note_access',
            ],
            [
                'id'    => 39,
                'title' => 'crm_document_create',
            ],
            [
                'id'    => 40,
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => 41,
                'title' => 'crm_document_show',
            ],
            [
                'id'    => 42,
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => 43,
                'title' => 'crm_document_access',
            ],
            [
                'id'    => 44,
                'title' => 'asset_management_access',
            ],
            [
                'id'    => 45,
                'title' => 'asset_category_create',
            ],
            [
                'id'    => 46,
                'title' => 'asset_category_edit',
            ],
            [
                'id'    => 47,
                'title' => 'asset_category_show',
            ],
            [
                'id'    => 48,
                'title' => 'asset_category_delete',
            ],
            [
                'id'    => 49,
                'title' => 'asset_category_access',
            ],
            [
                'id'    => 50,
                'title' => 'asset_location_create',
            ],
            [
                'id'    => 51,
                'title' => 'asset_location_edit',
            ],
            [
                'id'    => 52,
                'title' => 'asset_location_show',
            ],
            [
                'id'    => 53,
                'title' => 'asset_location_delete',
            ],
            [
                'id'    => 54,
                'title' => 'asset_location_access',
            ],
            [
                'id'    => 55,
                'title' => 'asset_status_create',
            ],
            [
                'id'    => 56,
                'title' => 'asset_status_edit',
            ],
            [
                'id'    => 57,
                'title' => 'asset_status_show',
            ],
            [
                'id'    => 58,
                'title' => 'asset_status_delete',
            ],
            [
                'id'    => 59,
                'title' => 'asset_status_access',
            ],
            [
                'id'    => 60,
                'title' => 'asset_create',
            ],
            [
                'id'    => 61,
                'title' => 'asset_edit',
            ],
            [
                'id'    => 62,
                'title' => 'asset_show',
            ],
            [
                'id'    => 63,
                'title' => 'asset_delete',
            ],
            [
                'id'    => 64,
                'title' => 'asset_access',
            ],
            [
                'id'    => 65,
                'title' => 'assets_history_access',
            ],
            [
                'id'    => 66,
                'title' => 'baglanti_testi_create',
            ],
            [
                'id'    => 67,
                'title' => 'baglanti_testi_edit',
            ],
            [
                'id'    => 68,
                'title' => 'baglanti_testi_show',
            ],
            [
                'id'    => 69,
                'title' => 'baglanti_testi_delete',
            ],
            [
                'id'    => 70,
                'title' => 'baglanti_testi_access',
            ],
            [
                'id'    => 71,
                'title' => 'network_alert_create',
            ],
            [
                'id'    => 72,
                'title' => 'network_alert_edit',
            ],
            [
                'id'    => 73,
                'title' => 'network_alert_show',
            ],
            [
                'id'    => 74,
                'title' => 'network_alert_delete',
            ],
            [
                'id'    => 75,
                'title' => 'network_alert_access',
            ],
            [
                'id'    => 76,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 77,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 78,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 79,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 80,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 81,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 82,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 83,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 84,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 85,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 86,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 87,
                'title' => 'product_create',
            ],
            [
                'id'    => 88,
                'title' => 'product_edit',
            ],
            [
                'id'    => 89,
                'title' => 'product_show',
            ],
            [
                'id'    => 90,
                'title' => 'product_delete',
            ],
            [
                'id'    => 91,
                'title' => 'product_access',
            ],
            [
                'id'    => 92,
                'title' => 'client_management_setting_access',
            ],
            [
                'id'    => 93,
                'title' => 'currency_create',
            ],
            [
                'id'    => 94,
                'title' => 'currency_edit',
            ],
            [
                'id'    => 95,
                'title' => 'currency_show',
            ],
            [
                'id'    => 96,
                'title' => 'currency_delete',
            ],
            [
                'id'    => 97,
                'title' => 'currency_access',
            ],
            [
                'id'    => 98,
                'title' => 'transaction_type_create',
            ],
            [
                'id'    => 99,
                'title' => 'transaction_type_edit',
            ],
            [
                'id'    => 100,
                'title' => 'transaction_type_show',
            ],
            [
                'id'    => 101,
                'title' => 'transaction_type_delete',
            ],
            [
                'id'    => 102,
                'title' => 'transaction_type_access',
            ],
            [
                'id'    => 103,
                'title' => 'income_source_create',
            ],
            [
                'id'    => 104,
                'title' => 'income_source_edit',
            ],
            [
                'id'    => 105,
                'title' => 'income_source_show',
            ],
            [
                'id'    => 106,
                'title' => 'income_source_delete',
            ],
            [
                'id'    => 107,
                'title' => 'income_source_access',
            ],
            [
                'id'    => 108,
                'title' => 'client_status_create',
            ],
            [
                'id'    => 109,
                'title' => 'client_status_edit',
            ],
            [
                'id'    => 110,
                'title' => 'client_status_show',
            ],
            [
                'id'    => 111,
                'title' => 'client_status_delete',
            ],
            [
                'id'    => 112,
                'title' => 'client_status_access',
            ],
            [
                'id'    => 113,
                'title' => 'project_status_create',
            ],
            [
                'id'    => 114,
                'title' => 'project_status_edit',
            ],
            [
                'id'    => 115,
                'title' => 'project_status_show',
            ],
            [
                'id'    => 116,
                'title' => 'project_status_delete',
            ],
            [
                'id'    => 117,
                'title' => 'project_status_access',
            ],
            [
                'id'    => 118,
                'title' => 'client_management_access',
            ],
            [
                'id'    => 119,
                'title' => 'client_create',
            ],
            [
                'id'    => 120,
                'title' => 'client_edit',
            ],
            [
                'id'    => 121,
                'title' => 'client_show',
            ],
            [
                'id'    => 122,
                'title' => 'client_delete',
            ],
            [
                'id'    => 123,
                'title' => 'client_access',
            ],
            [
                'id'    => 124,
                'title' => 'project_create',
            ],
            [
                'id'    => 125,
                'title' => 'project_edit',
            ],
            [
                'id'    => 126,
                'title' => 'project_show',
            ],
            [
                'id'    => 127,
                'title' => 'project_delete',
            ],
            [
                'id'    => 128,
                'title' => 'project_access',
            ],
            [
                'id'    => 129,
                'title' => 'note_create',
            ],
            [
                'id'    => 130,
                'title' => 'note_edit',
            ],
            [
                'id'    => 131,
                'title' => 'note_show',
            ],
            [
                'id'    => 132,
                'title' => 'note_delete',
            ],
            [
                'id'    => 133,
                'title' => 'note_access',
            ],
            [
                'id'    => 134,
                'title' => 'document_create',
            ],
            [
                'id'    => 135,
                'title' => 'document_edit',
            ],
            [
                'id'    => 136,
                'title' => 'document_show',
            ],
            [
                'id'    => 137,
                'title' => 'document_delete',
            ],
            [
                'id'    => 138,
                'title' => 'document_access',
            ],
            [
                'id'    => 139,
                'title' => 'transaction_create',
            ],
            [
                'id'    => 140,
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 141,
                'title' => 'transaction_show',
            ],
            [
                'id'    => 142,
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 143,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 144,
                'title' => 'client_report_create',
            ],
            [
                'id'    => 145,
                'title' => 'client_report_edit',
            ],
            [
                'id'    => 146,
                'title' => 'client_report_show',
            ],
            [
                'id'    => 147,
                'title' => 'client_report_delete',
            ],
            [
                'id'    => 148,
                'title' => 'client_report_access',
            ],
            [
                'id'    => 149,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 150,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 151,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 152,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 153,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 154,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 155,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 156,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 157,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 158,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 159,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 160,
                'title' => 'task_create',
            ],
            [
                'id'    => 161,
                'title' => 'task_edit',
            ],
            [
                'id'    => 162,
                'title' => 'task_show',
            ],
            [
                'id'    => 163,
                'title' => 'task_delete',
            ],
            [
                'id'    => 164,
                'title' => 'task_access',
            ],
            [
                'id'    => 165,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 166,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
