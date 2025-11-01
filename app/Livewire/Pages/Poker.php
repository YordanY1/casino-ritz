<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Poker extends Component
{
    public function render()
    {
        $jsonLd = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'SportsActivityLocation',
            'name' => 'Poker Room – Casino Ritz',
            'description' => 'Texas Hold’em кеш маси, Pot-Limit Omaha и месечни турнири в Casino Ritz, Пловдив. Ежедневна жива игра и денонощна покер атмосфера.',
            'url' => url()->current(),
            'image' => asset('images/logo.png'),
            'logo' => asset('images/logo.png'),

            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'ул. Васил Левски 11',
                'addressLocality' => 'Пловдив',
                'postalCode' => '4000',
                'addressCountry' => 'BG'
            ],

            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => 42.1354,
                'longitude' => 24.7453
            ],

            'amenityFeature' => [
                [
                    '@type' => 'LocationFeatureSpecification',
                    'name' => 'Texas Hold’em кеш маси',
                    'value' => true
                ],
                [
                    '@type' => 'LocationFeatureSpecification',
                    'name' => 'Pot-Limit Omaha кеш маси',
                    'value' => true
                ],
                [
                    '@type' => 'LocationFeatureSpecification',
                    'name' => 'Месечни покер турнири',
                    'value' => true
                ],
            ],

            'event' => [
                '@type' => 'EventSeries',
                'name' => 'Месечни Poker турнири',
                'eventSchedule' => [
                    '@type' => 'Schedule',
                    'repeatFrequency' => 'P1M',
                    'scheduleTimezone' => 'Europe/Sofia'
                ],
                'location' => [
                    '@type' => 'Place',
                    'name' => 'Casino Ritz Poker Room',
                    'address' => [
                        '@type' => 'PostalAddress',
                        'addressLocality' => 'Пловдив',
                        'streetAddress' => 'ул. Васил Левски 11'
                    ]
                ]
            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        return view('livewire.pages.poker')
            ->layout('layouts.app', [
                'title' => 'Poker - Casino Ritz',
                'description' => 'Texas Hold’em кеш маси, Pot-Limit Omaha и покер турнири с награди в Casino Ritz, Пловдив.',
                'keywords' => 'poker, texas holdem, omaha, покер, покер пловдив, кеш маси, poker casino ritz',
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
