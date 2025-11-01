<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.pages.about')
            ->layout('layouts.app', [
                'title' => 'За нас - Casino Ritz',
                'description' => 'Научете повече за Casino Ritz – луксозно казино в Пловдив с ротативки, рулетка, блекджек, покер турнири и VIP програма.',
                'author' => 'Casino Ritz Team',
                'robots' => 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1',
                'ogType' => 'website',
                'image' => asset('images/logo.png'),
                'twitter' => '@casinoritz',

                // Breadcrumb schema
                'breadcrumb' => [
                    ['name' => 'Начало', 'url' => url('/')],
                    ['name' => 'За нас', 'url' => url('/about')],
                ],

                // Page schema
                'schema' => [
                    '@type' => 'AboutPage',
                    'name' => 'За Casino Ritz',
                    'description' => 'Информация за Casino Ritz – премиум казино в Плодвив, предлагащо най-добрите игрални преживявания.',
                ],

                // Organization schema
                'organizationSchema' => [
                    '@type' => 'Organization',
                    'name' => 'Casino Ritz',
                    'url' => url('/'),
                    'logo' => asset('images/logo.png'),
                    'sameAs' => [
                        'https://www.facebook.com/Ritzcasino',
                        'https://www.instagram.com/ritzstarcasino/',
                    ],
                    'contactPoint' => [
                        '@type' => 'ContactPoint',
                        'telephone' => '+359888508583',
                        'contactType' => 'customer service',
                        'areaServed' => 'BG',
                        'availableLanguage' => ['Bulgarian', 'English']
                    ]
                ],
            ]);
    }
}
