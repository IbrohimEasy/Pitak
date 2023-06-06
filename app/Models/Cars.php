<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;

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
}
