<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class GalleryEvents extends Component
{
    public array $albums = [
        'opening-night' => [
            'title' => 'Откриване на сезона',
            'cover' => 'events.jpg',
            'images' => [
                'events.jpg',
                'events.jpg',
                'events.jpg',
            ],
        ],
        'poker-august' => [
            'title' => 'Покер турнир август',
            'cover' => 'events.jpg',
            'images' => [
                'events.jpg',
                'events.jpg',
            ],
        ],
        'jazz-night' => [
            'title' => 'Нощ на джаза',
            'cover' => 'events.jpg',
            'images' => [
                'events.jpg',
                'events.jpg',
                'events.jpg',
                'events.jpg',
            ],
        ],
    ];

    public function render()
    {
        return view('livewire.pages.gallery-events', [
            'albums' => $this->albums,
        ])->layout('layouts.app', ['title' => __('gallery.events')]);
    }
}
