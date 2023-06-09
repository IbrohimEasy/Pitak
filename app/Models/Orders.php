<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Orders extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'yy_orders';

    protected $fillable = [
        'status_id',
        'driver_id',
        'cars_list_id',
        'company_id',
        'from_id',
        'to_id',
        'price',
        'price_type',
        'title',
        'start_date',
        'seats'
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function carList(): BelongsTo
    {
        return $this->belongsTo(CarList::class);
    }

    public function from(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function to(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    // public function personalInfo(): BelongsTo
    // {
    //     return $this->belongsTo(PersonalInfo::class);
    // }

    // public function status(): HasOne
    // {
    //     return $this->hasOne(Status::class);
    // }
}
