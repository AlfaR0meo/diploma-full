<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecoidea extends Model
{
    use HasFactory;

    protected $table = 'ecoideas';

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}
