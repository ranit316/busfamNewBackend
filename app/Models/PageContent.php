<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    protected $fillable = [
        'page_id',
        'slug',
        'key',
        'value',
        'type',
    ];
}
