<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;
    protected $fillable = [
        'u_id',
        'f_id',
        'status',

    ];

    protected $primaryKey = 'friend_id';
}
