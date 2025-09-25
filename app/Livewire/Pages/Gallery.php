<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Gallery extends Component
{
    public function render()
    {
        return view('livewire.pages.gallery')->layout('layouts.app');
    }
}
