<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.pages.home')
            ->layout('layouts.app', [
                'title' => 'Casino Ritz - Начало',
                'description' => 'Casino Ritz – играй най-добрите казино игри, ротативки и вземи бонуси още днес.',
                'author' => 'Casino Ritz Team',
                'robots' => 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1',
                'ogType' => 'website',
                'image' => asset('images/logo.png'),
                'twitter' => '@casinoritz',

                'breadcrumb' => [
                    ['name' => 'Начало', 'url' => url('/')],
                ],

                'schema' => [
                    '@type' => 'WebPage',
                    'name' => 'Casino Ritz – Начало',
                    'description' => 'Официална страница на Casino Ritz.',
                ],

                'websiteSchema' => [
                    '@type' => 'WebSite',
                    'name' => 'Casino Ritz',
                    'url' => url('/'),
                    'potentialAction' => [
                        '@type' => 'SearchAction',
                        'target' => url('/search') . '?q={search_term_string}',
                        'query-input' => 'required name=search_term_string',
                    ],
                ],

                'organizationSchema' => [
                    '@type' => 'Organization',
                    'name' => 'Casino Ritz',
                    'url' => url('/'),
                    'logo' => asset('images/logo.png'),
                    'sameAs' => [
                        'https://www.facebook.com/Ritzcasino',
                        'https://www.instagram.com/ritzstarcasino/',
                    ],
                ],

                'isHome' => true,
            ]);
    }
}
