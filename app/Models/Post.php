<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'post_body',
        'post_image',
        'post_video',
        'tag',
        'parent_id',
        'post_type',
    ];

    protected $primaryKey = 'post_id';
}
