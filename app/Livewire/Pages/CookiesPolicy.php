<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class CookiesPolicy extends Component
{
    public function render()
    {
        return view('livewire.pages.cookies-policy')
            ->layout('layouts.app', [
                'title' => __('cookies.title'),
                'description' => __('cookies.intro'),
                'keywords' => 'cookies policy, политика за бисквитки, Casino Ritz',
                'robots' => 'index, follow',
            ]);
    }
}
