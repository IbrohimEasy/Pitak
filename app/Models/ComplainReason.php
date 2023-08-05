<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplainReason extends Model
{
    use HasFactory;
    
    protected $table = 'yy_complain_reason';

    public $fillable = [
        'id',
        'text'
    ];
}
