<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'page_name',
        'blade_name',
        'slug',
        'paralink',
        'seo',
        'banner_image',
    ];

    public function content()
    {
        return $this->hasMany(PageContent::class, 'page_id', 'id');
    }
}
