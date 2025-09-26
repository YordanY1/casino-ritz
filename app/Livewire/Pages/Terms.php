<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Terms extends Component
{
    public function render()
    {
        return view('livewire.pages.terms')
            ->layout('layouts.app', [
                'title' => __('terms.title'),
                'description' => __('terms.intro'),
                'keywords' => 'terms and conditions, общи условия, Casino Ritz',
                'robots' => 'index, follow',
            ]);
    }
}
