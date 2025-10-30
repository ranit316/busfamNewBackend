<?php

use App\Models\Media;

if (!function_exists('getMediaUrl')) {
    function getMediaUrl($media_id)
    {
        if (!$media_id) {
            return asset('images/no-image.jpg'); // fallback image
        }

        $media = Media::find($media_id);
        if ($media && $media->url) {
            return asset($media->url); // full public URL
        }

        return asset('images/no-image.jpg'); // fallback
    }
}
