<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Services\MysteryService;

class Mysteries extends Component
{
    public array $mysteries = [];

    public function mount(MysteryService $service)
    {
        $this->mysteries = $service->getMysteries();
    }

    public function render()
    {
        return view('livewire.pages.mysteries');
    }
}
