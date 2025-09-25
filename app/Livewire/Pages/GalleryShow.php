<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Gallery;

class GalleryShow extends Component
{
    public $gallery;

    public function mount($lang, $slug)
    {
        $this->gallery = Gallery::with('albums.photos')->where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        $images = [];

        if ($this->gallery->slug === 'interior') {
            $images = $this->gallery->photos->pluck('path')
                ->map(fn($img) => \Storage::url($img))
                ->toArray();
        }

        return view('livewire.pages.gallery-show', [
            'gallery' => $this->gallery,
            'images' => $images,
            'albums' => $this->gallery->albums,
        ])->layout('layouts.app', [
            'title' => $this->gallery->translated_title,
        ]);
    }
}
