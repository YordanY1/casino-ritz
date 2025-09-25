<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Slot extends Component
{
    public function render()
    {
        return view('livewire.pages.slot')->layout('layouts.app');
    }
}
