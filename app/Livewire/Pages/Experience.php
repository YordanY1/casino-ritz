<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Experience extends Component
{
    public array $items = [
        ['title' => 'experience.live', 'image' => '/images/live.jpg', 'route' => 'live-game'],
        ['title' => 'experience.slots', 'image' => '/images/slots.jpg', 'route' => 'slot'],
        ['title' => 'experience.poker', 'image' => '/images/poker.jpg', 'route' => 'poker'],
        ['title' => 'experience.tournaments', 'image' => '/images/tournaments.jpg', 'url' => 'https://www.facebook.com/Ritzstarcasinopoker'],
        ['title' => 'experience.promotions', 'image' => '/images/promotions.jpg', 'route' => 'promotions'],
        ['title' => 'experience.events', 'image' => '/images/events.jpg', 'route' => 'gallery'],
    ];

    public function render()
    {
        return view('livewire.pages.experience', [
            'items' => $this->items,
        ]);
    }
}
