<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApManagement extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public const AUTO_BACKUP_RADIO = [
        'ap_auto_backup_on' => 'Hayır',
    ];

    public const AP_STATUS_SELECT = [
        'ap_aktif_status'   => 'Aktif',
        'ap_pasif_status'   => 'Pasif',
        'ap_suspend_status' => 'Askıya Alındı',
    ];

    public const AP_MARKA_MODEL_SELECT = [
        'mikrotik' => 'Mikrotik',
        'ubiquiti' => 'Ubiquiti',
        'cambium'  => 'Cambium',
        'mimosa'   => 'Mimosa',
    ];

    public const MIKROTIK_API_VERSION_SELECT = [
        'mikrotik_version_643_ustu' => 'Mikrotik Versiyonu 6.43 ve üzeridir.',
        'mikrotik_version_643_alti' => 'Mikrotik Versiyonu 6.43 ve altındadır.',
    ];

    public const AP_PORT_SPEED_SELECT = [
        'ap_portspeed_100Mbit_ethernet' => '100 Mbit Ethernet',
        'ap_portspeed_1Gbit_ethernet'   => '1 Gbit Ethernet',
        'ap_portspeed_1GbitSFP'         => 'ap_portspeed_1GbitSFP',
    ];

    public $table = 'ap_managements';

    protected $hidden = [
        'ap_password',
    ];

    protected $dates = [
        'ap_installation_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'ap_name',
        'ap_ip_address',
        'ap_username',
        'ap_password',
        'ap_marka_model',
        'mikrotik_api_version',
        'ap_ssh_port',
        'ap_api_port',
        'ap_permission_yonet',
        'ap_status',
        'ap_monitor',
        'ap_avarage_1_day',
        'ap_last_ping',
        'ap_port_speed',
        'last_frequency',
        'auto_backup',
        'ap_vlan',
        'ap_max_wlan_register',
        'ap_max_pppoe',
        'ap_switch_port_number',
        'ap_installation_date',
        'created_at',
        'ap_station_id',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public static function boot()
    {
        parent::boot();
        ApManagement::observe(new \App\Observers\ApManagementActionObserver());
    }

    public function getApInstallationDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setApInstallationDateAttribute($value)
    {
        $this->attributes['ap_installation_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function ap_station()
    {
        return $this->belongsTo(StationManagement::class, 'ap_station_id');
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
