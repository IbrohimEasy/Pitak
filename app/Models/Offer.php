<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Offer extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'yy_offers';

    protected $fillable = [
        'driver_id',
        'client_id',
        'order_id',
        'order_detail_id',
        'price',
        'status',
        'comment',
    ];

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Drivers::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Clients::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Orders::class);
    }

    public function orderDetail(): BelongsTo
    {
        return $this->belongsTo(OrderDetail::class);
    }
}
