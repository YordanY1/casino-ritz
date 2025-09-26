<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Experience extends Component
{
    public array $items = [
        ['title' => 'experience.live', 'image' => '/images/live.jpg', 'route' => 'live-game'],
        ['title' => 'experience.slots', 'image' => '/images/slots.jpg', 'route' => 'slot'],
        ['title' => 'experience.poker', 'image' => '/images/poker.jpg', 'route' => 'poker'],
        ['title' => 'experience.tournaments', 'image' => '/images/tournaments.jpg', 'url' => 'https://www.facebook.com/Ritzstarcasinopoker'],
        ['title' => 'experience.promotions', 'image' => '/images/promotions.jpg', 'route' => 'promotions'],
        ['title' => 'experience.events', 'image' => '/images/events.jpg', 'route' => 'gallery'],
    ];

    public function render()
    {
        $jsonLd = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'CollectionPage',
            'name' => 'Преживявания в Casino Ritz',
            'description' => 'Разгледайте игрите на живо, ротативките, покера, турнирите, промоциите и събитията в Casino Ritz – едно от най-луксозните казина в Пловдив.',
            'url' => url()->current(),
            'hasPart' => collect($this->items)->map(function ($item) {
                return [
                    '@type' => 'WebPage',
                    'name' => __($item['title']),
                    'url' => $item['route'] ?? false
                        ? route($item['route'], ['lang' => app()->getLocale()])
                        : ($item['url'] ?? url('/')),

                ];
            })->toArray(),
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        return view('livewire.pages.experience', [
            'items' => $this->items,
        ])->layout('layouts.app', [
            'title' => __('experience.title'),
            'description' => 'Casino Ritz предлага уникално изживяване – live игри, ротативки, покер турнири, специални събития и промоции в Пловдив.',
            'keywords' => 'casino ritz experience, казино пловдив, live игри, ротативки, покер, турнири, казино промоции',
            'author' => 'Casino Ritz Team',
            'robots' => 'index, follow',
            'revisitAfter' => '7 days',
            'ogType' => 'website',
            'image' => asset('images/experience-cover.jpg'),
            'twitter' => '@casinoritz',
            'jsonLd' => $jsonLd,
        ]);
    }
}
