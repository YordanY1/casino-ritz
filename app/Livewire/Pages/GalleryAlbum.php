<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class GalleryAlbum extends Component
{
    public string $album;

    public array $albums = [
        'opening-night' => [
            'title' => 'Откриване на сезона',
            'cover' => 'events.jpg',
            'images' => ['events.jpg', 'events.jpg', 'events.jpg'],
        ],
        'poker-august' => [
            'title' => 'Покер турнир август',
            'cover' => 'events.jpg',
            'images' => ['events.jpg', 'events.jpg'],
        ],
        'jazz-night' => [
            'title' => 'Нощ на джаза',
            'cover' => 'events.jpg',
            'images' => ['events.jpg', 'events.jpg', 'events.jpg', 'events.jpg'],
        ],
    ];

    public function mount(string $album)
    {
        if (!isset($this->albums[$album])) {
            abort(404);
        }

        $this->album = $album;
    }

    public function render()
    {
        return view('livewire.pages.gallery-album', [
            'albumData' => $this->albums[$this->album],
        ])->layout('layouts.app', ['title' => $this->albums[$this->album]['title']]);
    }
}
