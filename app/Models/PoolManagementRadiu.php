<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PoolManagementRadiu extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public const IP_RADIUS_STATUS_RADIO = [
        'Bu IP aralığını geçici olarak Rezerve Et.'             => 'gecici_suspend',
        'Bu IP Blogunu PPPOE Müşterileri için IP Havuzuna ekle' => 'aktif_pppoe',
        'Bu IP Blogunu iptal et.'                               => 'blog_radius_iptal',
    ];

    public $table = 'pool_management_radius';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'radius_pool_name',
        'created_at',
        'ip_ranges',
        'radius_ip_nas_id',
        'ip_radius_status',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public function radius_ip_nas()
    {
        return $this->belongsTo(NasManager::class, 'radius_ip_nas_id');
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
