<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class LiveGame extends Component
{
    public function render()
    {
        $jsonLd = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => 'Игри на живо - Casino Ritz',
            'description' => 'Игри на живо в Казино Риц – рулетка, блекджек, бакара и покер с професионални крупиета в реално време.',
            'mainEntity' => [
                '@type' => 'ItemList',
                'itemListElement' => [
                    [
                        '@type' => 'ListItem',
                        'position' => 1,
                        'name' => 'Рулетка',
                        'url' => url('/live-game/roulette'),
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 2,
                        'name' => 'Блекджек',
                        'url' => url('/live-game/blackjack'),
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 3,
                        'name' => 'Бакара',
                        'url' => url('/live-game/baccarat'),
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 4,
                        'name' => 'Caribbean Stud Poker',
                        'url' => url('/live-game/caribbean-stud-poker'),
                    ],
                ]
            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        return view('livewire.pages.live-game')
            ->layout('layouts.app', [
                'title' => 'Игри на живо - Casino Ritz',
                'description' => 'Открийте игрите на живо в Casino Ritz – рулетка, блекджек, бакара, покер и други игри с професионални крупиета и луксозна атмосфера.',
                'keywords' => 'казино игри на живо, live casino, рулетка, блекджек, бакара, покер, Casino Ritz',
                'author' => 'Casino Ritz Team',
                'robots' => 'index, follow',
                'revisitAfter' => '7 days',
                'ogType' => 'website',
                'image' => asset('images/live-games.jpg'),
                'twitter' => '@casinoritz',
                'jsonLd' => $jsonLd,
            ]);
    }
}
