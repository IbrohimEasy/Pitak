<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarList extends Model
{
    use HasFactory;

    protected $table = 'yy_car_lists';

    protected $fillable = [
        'name',
        'status_id',
        'car_type_id'
    ];
}
