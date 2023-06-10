<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Drivers extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'yy_drivers';

    protected $fillable = [
        'personal_info_id',
        'serial_number',
        'issued_by',
        'passport_image',
        'passport_expired_date',
        'license_number',
        'license_expired_date',
        'license_image',
        'status_id'
    ];

    public function personalInfo(): BelongsTo
    {
        return $this->belongsTo(PersonalInfo::class);
    }
}
