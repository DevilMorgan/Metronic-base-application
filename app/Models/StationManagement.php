<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StationManagement extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public const STATION_STATUS_SELECT = [
        'Aktif'   => 'Aktif',
        'Pasif'   => 'Pasif',
        'Suspend' => 'Askıya Alındı',
    ];

    public const MONITOR_STATUS_RADIO = [
        'station_monitor_yes' => 'İstasyon Monitor Edilsin',
        'station_monitor_no'  => 'İstasyon Monitor Edilmesin',
    ];

    public const STATION_CONNECTION_TYPE_SELECT = [
        'wireless_link'  => 'Kablosuz Link',
        'metro_ethernet' => 'Metro Ethernet',
        'radyo_link'     => 'Radyo Link',
    ];

    public const STATION_PORT_SPEED_SELECT = [
        '1gbit_ethernet_sfp_port_speed' => '1Gbit Ethernet veya SFP girişi',
        '100Mbit_ethernet_port_speed'   => '100Mbit Ethernet Girişi',
    ];

    public const STATION_DEVICE_TYPE_SELECT = [
        'station_mikrotik_crs_switch' => 'Mikrotik CRS Switch',
        'station_mikrotik_ccr_router' => 'Mikrotik CCR Router',
        'station_ubnt_edge_switch'    => 'UBNT Edge POE Switch',
        'unmanaged_switch'            => 'Yonetilmez Herhangi Bir Switch',
    ];

    public $table = 'station_managements';

    protected $dates = [
        'station_installation',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'station_name',
        'station_status',
        'station_alici_ip',
        'avarage_ping_1_day',
        'last_ping',
        'monitor_status',
        'station_connection_type',
        'station_port_speed',
        'station_capacity_speed',
        'station_max_ap',
        'station_max_cpe',
        'station_max_pppoe',
        'station_device_type',
        'station_switch_port_number',
        'station_maps_latitude',
        'station_maps_longitude',
        'station_installation',
        'station_contact_person',
        'station_contact_phone',
        'created_at',
        'station_nas_id',
        'station_sube_id',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public static function boot()
    {
        parent::boot();
        StationManagement::observe(new \App\Observers\StationManagementActionObserver());
    }

    public function apStationApManagements()
    {
        return $this->hasMany(ApManagement::class, 'ap_station_id', 'id');
    }

    public function getStationInstallationAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStationInstallationAttribute($value)
    {
        $this->attributes['station_installation'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function station_nas()
    {
        return $this->belongsTo(NasManager::class, 'station_nas_id');
    }

    public function station_sube()
    {
        return $this->belongsTo(Team::class, 'station_sube_id');
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
