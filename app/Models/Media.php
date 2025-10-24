<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'media_name',
        'type',
        'url',
        'alt',
        'caption',
        'status',
    ];
}
