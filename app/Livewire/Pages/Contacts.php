<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Contacts extends Component
{
    public function render()
    {
        $jsonLd = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'LocalBusiness',
            'name' => 'Casino Ritz',
            'image' => asset('images/logo.png'),
            'url' => url('/contacts'),
            'telephone' => '+359 888 123 456',
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
            'openingHours' => 'Mo-Su 00:00-23:59',
            'sameAs' => [
                'https://www.facebook.com/Ritzstarcasinopoker',
                'https://www.instagram.com/casinoritz',
            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        return view('livewire.pages.contacts')->layout('layouts.app', [
            'title' => __('contacts.title'),
            'description' => 'Свържете се с Casino Ritz – адрес, телефон, работно време и локация в Пловдив.',
            'keywords' => 'casino ritz контакти, казино пловдив адрес, телефон casino ritz, работно време казино',
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
