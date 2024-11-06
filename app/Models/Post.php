<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Thêm trường 'title', 'content' và '_token' vào fillable
    protected $fillable = [
        'title',
        'content',
        'thumbnail',
    ];
}
