<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        // 'title', 'youtube_link', 'slug', 'views', 'dates', 'revenues', 'rates', 'revenueshare', 'user_id', 'for_user_id', 'published', 'published_to_all'
        'name', 'slug', 'price', 'user_id', 'published'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function scopeUnpublished($query)
    {
        return $query->where('published', false);
    }
}
