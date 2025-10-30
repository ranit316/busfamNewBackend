<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'media_id',
        'text',
        'sort',
        'status'
    ];

    public function getImage()
    {
        return $this->belongsTo(Media::class, 'media_id', 'id');
    }
}
