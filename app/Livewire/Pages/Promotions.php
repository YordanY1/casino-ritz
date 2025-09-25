<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Promotions extends Component
{
    public array $images = [
        'live.jpg',
        'events.jpg',
        'slot-bg-1.jpg',
        'slot-bg-2.jpg',
    ];

    public function render()
    {
        return view('livewire.pages.promotions', [
            'images' => $this->images,
        ])->layout('layouts.app', ['title' => __('promotions.title')]);
    }
}
