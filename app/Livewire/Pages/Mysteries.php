<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Mysteries extends Component
{
    public array $mysteries = [
        ['value' => 2580.15, 'range' => '1 000 – 3 000 BGN'],
        ['value' => 13630.09, 'range' => '15 000 – 30 000 BGN'],
        ['value' => 11763.67, 'range' => '10 000 – 15 000 BGN'],
        ['value' => 2942.54, 'range' => '3 000 – 6 000 BGN'],
        ['value' => 1958.69, 'range' => '2 000 – 4 000 BGN'],
        ['value' => 1273.96, 'range' => '1 000 – 3 000 BGN'],
        ['value' => 1032.86, 'range' => '1 000 – 2 000 BGN'],
        ['value' => 4155.35, 'range' => '3 000 – 5 000 BGN'],
        ['value' => 1925.21, 'range' => '1 000 – 2 000 BGN'],
        ['value' => 8097.41, 'range' => '8 000 – 10 000 BGN'],
    ];

    public function render()
    {
        return view('livewire.pages.mysteries')
            ->layout('layouts.app', ['title' => 'Мистерии']);
    }
}
