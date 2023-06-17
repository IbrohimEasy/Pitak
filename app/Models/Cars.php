<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cars extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'yy_cars';

    protected $fillable = [
        'car_list_id',
        'driver_id',
        'status',
        'reg_certificate',
        'reg_certificate_image',
        'images',
        'color_list_id',
        'class_list_id'
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(CarList::class, 'car_list_id', 'id');
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(ColorList::class, 'color_list_id', 'id');
    }

    public function class(): BelongsTo
    {
        return $this->belongsTo(ClassList::class, 'class_list_id', 'id');
    }
}
