<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class About extends Component
{
    public function render()
    {
        $jsonLd = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'Casino Ritz',
            'url' => url('/about'),
            'logo' => asset('images/logo.png'),
            'sameAs' => [
                'https://www.facebook.com/casinoritz',
                'https://www.instagram.com/casinoritz',
                'https://twitter.com/casinoritz',
            ],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => '+359888508583',
                'contactType' => 'customer service',
                'areaServed' => 'BG',
                'availableLanguage' => ['Bulgarian', 'English']
            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        return view('livewire.pages.about')
            ->layout('layouts.app', [
                'title' => 'За нас - Casino Ritz',
                'description' => 'Научете повече за Casino Ritz – най-голямото 5-звездно казино в България. От 2008 г. предлагаме ротативки, рулетка, блекджек и покер турнири в луксозна атмосфера.',
                'keywords' => 'casino ritz, за нас, казино пловдив, история, покер турнири, рулетка, блекджек',
                'author' => 'Casino Ritz Team',
                'robots' => 'index, follow',
                'revisitAfter' => '7 days',
                'ogType' => 'website',
                'image' => asset('images/logo.png'),
                'twitter' => '@casinoritz',
                'jsonLd' => $jsonLd,
            ]);
    }
}
