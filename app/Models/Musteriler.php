<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Musteriler extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public const ILETISIM_SMS_IZIN_SELECT = [
        'sms_abonelik_evet'      => 'Abonelik ve Hizmetlerim hakkında SMS ile bilgilendirilmek istiyorum.',
        'kampanya_abonelik_evet' => 'Duyuru ve Kampanyalar hakkında SMS ile bilgilendirilmek istiyorum.',
        'kesinti_abonelik_evet'  => 'Planlı Çalışma ve Kesinti bildirimlerini SMS ile almak istiyorum.',
        'sms_abonelik_kapali'    => 'SMS ile bilgilendirilmek istemiyorum.',
        'email_abonelik_evet'    => 'EMail adresim üzerinden bilgilendirme sağlayabilirsiniz.',
        'email_abonelik_hayir'   => 'EMail ile bilgilendirilmek istemiyorum.',
    ];

    public $table = 'musterilers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'website',
        'iletisim_sms_izin',
        'description',
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
