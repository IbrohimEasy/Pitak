<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
    use HasFactory;

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
        'status'
    ];
}
