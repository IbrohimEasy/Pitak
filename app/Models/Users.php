<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Users extends Model
{
    const MALE = 1;
    const FEMALE = 0;

    use HasFactory, SoftDeletes;

    protected $table = 'yy_users';

    protected $fillable = [
        'personal_info_id',
        'status_id',
        'company_id',
        'token',
        'balance',
        'personal_account',
        'type', // 0 - not confirmed, 1 - confirmed driver
        'about_me',
        'email',
        'password',
        'rating',
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function personalInfo(): BelongsTo
    {
        return $this->belongsTo(PersonalInfo::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'client_id', 'id');
    }

    public function commentScores()
    {
        return $this->hasMany(CommentScore::class, 'client_id', 'id');
    }

    public function carLists(): BelongsTo
    {
        return $this->belongsTo(CarList::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'driver_id', 'id');
    }

    public function cars()
    {
        return $this->hasMany(Cars::class, 'driver_id', 'id');
    }

    public function balanceHistory()
    {
        return $this->hasMany(BalanceHistory::class, 'user_id', 'id')->where('type', 1);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'id', 'user_id');
    }
}
