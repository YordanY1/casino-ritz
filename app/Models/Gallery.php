<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['title', 'slug', 'cover'];

    protected $casts = [
        'title' => 'array',
    ];


    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    public function photos()
    {
        return $this->hasMany(GalleryPhoto::class);
    }

    public function getTranslatedTitleAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->title[$locale]
            ?? $this->title['en']
            ?? '';
    }

    public function getDisplayTitleAttribute(): string
    {
        if (is_array($this->title)) {
            return $this->title['bg'] ?? reset($this->title);
        }

        return $this->title;
    }
}
