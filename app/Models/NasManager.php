<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NasManager extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public const AUTO_BACKUP_RADIO = [
        'ap_auto_backup_on' => 'Hayır',
    ];

    public const NAS_STATUS_SELECT = [
        'nas_aktif_status'   => 'Aktif',
        'nas_pasif_status'   => 'Pasif',
        'nas_suspend_status' => 'Askıya Alındı',
    ];

    public const NAS_MARKA_MODEL_SELECT = [
        'mikrotik' => 'Mikrotik',
        'ubiquiti' => 'Ubiquiti',
        'cambium'  => 'Cambium',
        'mimosa'   => 'Mimosa',
    ];

    public const MIKROTIK_API_VERSION_SELECT = [
        'mikrotik_version_643_ustu' => 'Mikrotik Versiyonu 6.43 ve üzeridir.',
        'mikrotik_version_643_alti' => 'Mikrotik Versiyonu 6.43 ve altındadır.',
    ];

    public $table = 'nas_managers';

    protected $hidden = [
        'nas_password',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nas_sube_id',
        'nas_name',
        'nas_ip_address',
        'nas_username',
        'nas_password',
        'nas_marka_model',
        'mikrotik_api_version',
        'nas_ssh_port',
        'nas_api_port',
        'nas_permission_yonet',
        'nas_status',
        'ap_monitor',
        'auto_backup',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public function stationNasStationManagements()
    {
        return $this->hasMany(StationManagement::class, 'station_nas_id', 'id');
    }

    public function nas_sube()
    {
        return $this->belongsTo(Team::class, 'nas_sube_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
