<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Poker extends Component
{
    public function render()
    {
        $jsonLd = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Event',
            'name' => 'Poker турнири и кеш игри в Casino Ritz',
            'description' => 'Texas Hold’em и Omaha кеш маси всеки ден + месечни покер турнири с добавен награден фонд в Casino Ritz, Пловдив.',
            'startDate' => date('Y-m-d'),
            'eventAttendanceMode' => 'https://schema.org/OfflineEventAttendanceMode',
            'eventStatus' => 'https://schema.org/EventScheduled',
            'location' => [
                '@type' => 'Place',
                'name' => 'Casino Ritz',
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => 'ул. Васил Левски 11',
                    'addressLocality' => 'Пловдив',
                    'postalCode' => '4000',
                    'addressCountry' => 'BG'
                ]
            ],
            'organizer' => [
                '@type' => 'Organization',
                'name' => 'Casino Ritz',
                'url' => url('/')
            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        return view('livewire.pages.poker')
            ->layout('layouts.app', [
                'title' => 'Poker - Casino Ritz',
                'description' => 'Texas Hold’em кеш маси, Pot-Limit Omaha и месечни турнири с награден фонд в Казино Ritz, Пловдив. Ежедневна жива игра и покер събития.',
                'keywords' => 'poker, texas hold’em, omaha, покер турнири, кеш маси, Casino Ritz, покер Пловдив',
                'author' => 'Casino Ritz Team',
                'robots' => 'index, follow',
                'revisitAfter' => '7 days',
                'ogType' => 'website',
                'image' => asset('images/poker.jpg'),
                'twitter' => '@casinoritz',
                'jsonLd' => $jsonLd,
            ]);
    }
}
