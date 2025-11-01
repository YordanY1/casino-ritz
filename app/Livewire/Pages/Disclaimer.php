<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Disclaimer extends Component
{
    public function render()
    {
        return view('livewire.pages.disclaimer')
            ->layout('layouts.app', [
                'title' => __('disclaimer.title') . ' - Casino Ritz',
                'description' => __('disclaimer.intro'),
                'robots' => 'noindex, follow',

                // Breadcrumb
                'breadcrumb' => [
                    ['name' => 'Начало', 'url' => url('/')],
                    ['name' => __('disclaimer.title'), 'url' => url('/disclaimer')],
                ],

                // WebPage Schema (Legal Page)
                'schema' => [
                    '@type' => 'WebPage',
                    'name' => __('disclaimer.title'),
                    'description' => __('disclaimer.intro'),
                    'isPartOf' => [
                        '@type' => 'WebSite',
                        'url' => url('/'),
                        'name' => 'Casino Ritz'
                    ],
                ],

                // Organization Schema reuse
                'organizationSchema' => [
                    '@type' => 'Organization',
                    'name' => 'Casino Ritz',
                    'url' => url('/'),
                    'logo' => asset('images/logo.png'),
                    'sameAs' => [
                        'https://www.facebook.com/Ritzcasino',
                        'https://www.instagram.com/ritzstarcasino/',
                    ]
                ],
            ]);
    }
}
