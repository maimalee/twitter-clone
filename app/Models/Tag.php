<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'blog_owner',
        'tagged_friend',
    ];
    protected $primaryKey = 'tag_ig';
}
