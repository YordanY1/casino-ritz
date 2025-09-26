<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Disclaimer extends Component
{
    public function render()
    {
        return view('livewire.pages.disclaimer')
            ->layout('layouts.app', [
                'title' => __('disclaimer.title'),
                'description' => __('disclaimer.intro'),
                'keywords' => 'casino disclaimer, legal disclaimer, отказ от отговорност, Casino Ritz',
                'robots' => 'index, follow',
            ]);
    }
}
