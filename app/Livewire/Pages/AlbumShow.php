<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Gallery;
use App\Models\Album;

class AlbumShow extends Component
{
    public $album;

    public function mount($lang, $gallery, $album)
    {
        $this->album = Album::where('slug', $album)
            ->whereHas('gallery', fn($q) => $q->where('slug', $gallery))
            ->with('photos')
            ->firstOrFail();
    }

    public function render()
    {
        $images = $this->album->photos->pluck('path')
            ->map(fn($img) => \Storage::url($img))
            ->toArray();

        return view('livewire.pages.album-show', [
            'album' => $this->album,
            'images' => $images,
        ])->layout('layouts.app', [
            'title' => $this->album->title,
        ]);
    }
}
