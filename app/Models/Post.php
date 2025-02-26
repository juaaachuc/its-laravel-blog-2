<?php

namespace App\Models;

use App\Traits\LogTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, LogTimestamps;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'is_published',
        'published_at'
    ];
}
