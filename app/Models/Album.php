<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['gallery_id', 'title', 'slug', 'cover'];

    protected $casts = [
        'title' => 'array',
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }


    public function getTranslatedTitleAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->title[$locale]
            ?? $this->title['en']
            ?? '';
    }
}
