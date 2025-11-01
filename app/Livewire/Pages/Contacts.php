<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Contacts extends Component
{
    public function render()
    {
        $localBusinessSchema = [
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
                'https://www.facebook.com/Ritzcasino',
                'https://www.instagram.com/ritzstarcasino/',
            ]
        ];

        return view('livewire.pages.contacts')
            ->layout('layouts.app', [

                'title'       => __('contacts.title') . ' - Casino Ritz Пловдив',
                'description' => 'Свържете се с Casino Ritz – адрес, телефон, работно време и локация в Пловдив.',
                'author'      => 'Casino Ritz Team',
                'robots'      => 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1',
                'ogType'      => 'website',
                'image'       => asset('images/logo.png'),
                'twitter'     => '@casinoritz',

                'breadcrumb' => [
                    ['name' => 'Начало', 'url' => url('/')],
                    ['name' => 'Контакти', 'url' => url('/contacts')],
                ],

                'schema' => [
                    '@type' => 'ContactPage',
                    'name' => 'Контакти Casino Ritz',
                    'description' => 'Контактна информация и адрес на Casino Ritz Пловдив.',
                ],

                'localBusinessSchema' => $localBusinessSchema,

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
