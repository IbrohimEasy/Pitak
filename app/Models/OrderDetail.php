<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $order_id
 * @property int $status_id
 * @property string $client_id
 * @property string $company_id
 * @property string $seats_type
 * @property string $seats_count
 * @property string $price
**/
class OrderDetail extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'yy_order_details';

    protected $fillable = [
        'order_id',
        'status_id',
        'client_id',
        'company_id',
        'seats_type',
        'seats_count',
        'price',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Orders::class);
    }
}
