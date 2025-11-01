<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class CookiesPolicy extends Component
{
    public function render()
    {
        return view('livewire.pages.cookies-policy')
            ->layout('layouts.app', [
                'title' => __('cookies.title') . ' - Casino Ritz',
                'description' => __('cookies.intro'),
                'robots' => 'noindex, follow',

                // breadcrumb
                'breadcrumb' => [
                    ['name' => 'Начало', 'url' => url('/')],
                    ['name' => __('cookies.title'), 'url' => url('/cookies-policy')],
                ],

                // Page schema
                'schema' => [
                    '@type' => 'WebPage',
                    'name' => __('cookies.title'),
                    'description' => __('cookies.intro'),
                    'isPartOf' => [
                        '@type' => 'WebSite',
                        'url' => url('/'),
                        'name' => 'Casino Ritz'
                    ],
                ],

                // Organization schema (re-use)
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
