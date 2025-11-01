<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Privacy extends Component
{
    public function render()
    {
        $jsonLd = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'PrivacyPolicy',
            'name' => 'Политика за поверителност - Casino Ritz',
            'description' => 'Официална политика за поверителност на Casino Ritz. Научете как събираме, обработваме и защитаваме вашите лични данни в съответствие с GDPR.',
            'url' => url()->current(),
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'Casino Ritz',
                'url' => url('/'),
                'logo' => asset('images/logo.png'),
            ]
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

        return view('livewire.pages.privacy')
            ->layout('layouts.app', [
                'title' => 'Политика за поверителност - Casino Ritz',
                'description' => 'Официална политика за поверителност на Casino Ritz съгласно GDPR. Как защитаваме личните ви данни.',
                'keywords' => 'privacy policy, политика за поверителност, Casino Ritz, GDPR, лични данни',
                'robots' => 'noindex, nofollow',
                'jsonLd' => $jsonLd,
            ]);
    }
}
