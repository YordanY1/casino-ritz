<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Poker extends Component
{
    public function render()
    {
        return view('livewire.pages.poker')
            ->layout('layouts.app', ['title' => 'Poker']);
    }
}
