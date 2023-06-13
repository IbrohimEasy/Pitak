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
        'status_id',
        'reg_certificate',
        'reg_certificate_image',
        'images',
        'color_list_id',
        'class_list_id'
    ];
    
    protected $casts = [
      'images'=>'array'
    ];
    public function carList(){
        return $this->hasOne(CarList::class, 'id', 'car_list_id');
    }
    public function driver(){
        return $this->hasOne(Drivers::class, 'id', 'driver_id');
    }
    public function status(){
        return $this->hasOne(Status::class, 'id', 'status_id');
    }
    public function colorList(){
        return $this->hasOne(ColorList::class, 'id', 'color_list_id');
    }
    public function classList(){
        return $this->hasOne(ClassList::class, 'id', 'class_list_id');
    }
}
