<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class LiveGame extends Component
{
    public function render()
    {
        $itemListSchema = [
            '@type' => 'ItemList',
            'name' => 'Live Casino Games',
            'itemListOrder' => 'Ascending',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Рулетка',
                    'url' => route('live-game', ['lang' => app()->getLocale()]) . '/caribbean-stud-poker',
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Блекджек',
                    'url' => route('live-game', ['lang' => app()->getLocale()]) . '/blackjack',
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 3,
                    'name' => 'Бакара',
                    'url' => route('live-game', ['lang' => app()->getLocale()]) . '/baccarat',
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 4,
                    'name' => 'Caribbean Stud Poker',
                    'url' => route('livegame.show', ['lang' => app()->getLocale(), 'slug' => 'caribbean-stud-poker']),
                ],
            ]
        ];

        return view('livewire.pages.live-game')->layout('layouts.app', [
            // META
            'title' => 'Игри на живо - Casino Ritz Пловдив',
            'description' => 'Live казино игри с професионални крупиета – рулетка, блекджек, бакара и покер в Casino Ritz Пловдив.',
            'robots' => 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1',
            'ogType' => 'website',
            'image' => asset('images/logo.png'),
            'twitter' => '@casinoritz',

            // Breadcrumb
            'breadcrumb' => [
                ['name' => 'Начало', 'url' => url('/')],
                ['name' => 'Игри на живо', 'url' => url('/live-game')],
            ],

            // WebPage Schema
            'schema' => [
                '@type' => 'WebPage',
                'name' => 'Live Casino Games - Casino Ritz',
                'description' => 'Игри на живо в Casino Ritz Пловдив: рулетка, блекджек, бакара и покер с крупие.',
            ],

            // Item List Schema for Games
            'itemListSchema' => $itemListSchema,

            // Organization reuse
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
