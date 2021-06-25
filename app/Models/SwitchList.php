<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SwitchList extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public const SWITCH_STATUS_SELECT = [
        'switch_aktif' => 'Aktif',
        'switch_pasif' => 'Pasif',
    ];

    public const SWITCH_MARKA_SELECT = [
        'mikrotik_switch'   => 'Mikrotik Switch',
        'ubnt_switch'       => 'Ubiquiti Switch',
        'unamanaged_switch' => 'Unmanaged Switch (Yönetilmez)',
    ];

    public $table = 'switch_lists';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'switch_name',
        'switch_ip_address',
        'switch_marka',
        'switch_port_sayisi',
        'switch_status',
        'switch_api_izin',
        'switch_notlar',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
