<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    use HasFactory;

    protected $table = 'yy_personal_info';

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'phone_number',
        'avatar',
        'status_id',
        'gender',
        'birth_date'
    ];
}
