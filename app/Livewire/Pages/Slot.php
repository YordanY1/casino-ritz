<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Slot extends Component
{
    public function render()
    {
        $jsonLd = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Casino',
            'name' => 'Слот зона – Casino Ritz',
            'description' => 'Над 210 слот машини от EGT, Novomatic, Merkur, Amatic, IGT и още в Casino Ritz, Пловдив. Прогресивни джакпоти и мистерии ежедневно.',
            'url' => url()->current(),
            'image' => asset('images/logo.png'),

            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'ул. Васил Левски 11',
                'addressLocality' => 'Пловдив',
                'postalCode' => '4000',
                'addressCountry' => 'BG',
            ],

            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => 42.1354,
                'longitude' => 24.7453
            ],

            'hasPart' => [
                [
                    '@type' => 'OfferCatalog',
                    'name' => 'Slot Machines',
                    'itemListElement' => [
                        ['@type' => 'Game', 'name' => 'EGT Slots'],
                        ['@type' => 'Game', 'name' => 'Novomatic Slots'],
                        ['@type' => 'Game', 'name' => 'Merkur Slots'],
                        ['@type' => 'Game', 'name' => 'Amatic Slots'],
                        ['@type' => 'Game', 'name' => 'CT Gaming Slots'],
                    ]
                ]
            ],

            'amenityFeature' => [
                [
                    '@type' => 'LocationFeatureSpecification',
                    'name' => 'Progressive Jackpots',
                    'value' => true
                ],
                [
                    '@type' => 'LocationFeatureSpecification',
                    'name' => 'Mystery Jackpot System',
                    'value' => true
                ],
                [
                    '@type' => 'LocationFeatureSpecification',
                    'name' => 'VIP Slot Area',
                    'value' => true
                ],
            ]
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

        return view('livewire.pages.slot')
            ->layout('layouts.app', [
                'title' => 'Слот игри - Casino Ritz',
                'description' => '210+ слот машини: EGT, Novomatic, Merkur, IGT. Jackpot системи, мистерии и VIP ротативни зали в Casino Ritz, Пловдив.',
                'keywords' => 'слот, слот машини, казино пловдив, ротативки, прогресивни джакпоти, mystery jackpot, EGT, Novomatic',
                'author' => 'Casino Ritz Team',
                'robots' => 'index, follow',
                'ogType' => 'website',
                'image' => asset('images/logo.png'),
                'twitter' => '@casinoritz',
                'jsonLd' => $jsonLd,
            ]);
    }
}
