<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Driver extends Model
{
    const MALE = 1;
    const FEMALE = 0;
    
    use HasFactory, SoftDeletes;

    protected $table = 'yy_drivers';

    protected $fillable = [
        'user_id',
        'status_id',
        'license_number',
        'license_expired_date',
        'license_image'
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(Users::class);
    }
}
