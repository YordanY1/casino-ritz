<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class LiveGame extends Component
{
    public function render()
    {
        return view('livewire.pages.live-game')
            ->layout('layouts.app', ['title' => __('livegame.title')]);
    }
}
