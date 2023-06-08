<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $table = 'yy_clients';

    protected $fillable = [
        'personal_info_id',
        'status_id'
    ];
}
