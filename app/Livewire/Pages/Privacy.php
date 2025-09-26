<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Privacy extends Component
{
    public function render()
    {
        return view('livewire.pages.privacy')
            ->layout('layouts.app', [
                'title' => 'Политика за поверителност - Casino Ritz',
                'description' => 'Политика за поверителност на Casino Ritz: как събираме, използваме и защитаваме вашите лични данни съгласно GDPR.',
                'keywords' => 'privacy policy, политика за поверителност, casino ritz, gdpr, лични данни',
                'robots' => 'index, follow',
            ]);
    }
}
