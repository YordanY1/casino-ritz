<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Promotion;

class Promotions extends Component
{
    public function render()
    {
        $locale = app()->getLocale();

        $promotions = Promotion::where('locale', $locale)->latest()->get();

        if ($promotions->isEmpty()) {
            $promotions = Promotion::where('locale', 'en')->latest()->get();
        }

        $jsonLd = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'OfferCatalog',
            'name' => 'Промоции и бонуси в Casino Ritz',
            'description' => 'Актуални казино бонуси, промоции и оферти от Casino Ritz – безплатни завъртания, cashback, mystery награди и VIP бонуси.',
            'url' => url()->current(),
            'provider' => [
                '@type' => 'Casino',
                'name' => 'Casino Ritz',
                'address' => [
                    '@type' => 'PostalAddress',
                    'addressLocality' => 'Пловдив',
                    'addressCountry' => 'BG',
                ],
                'logo' => asset('images/logo.png'),
            ],
            'itemListElement' => $promotions->map(function ($promo, $index) {
                return [
                    '@type' => 'Offer',
                    'position' => $index + 1,
                    'name' => $promo->title,
                    'description' => strip_tags($promo->content ?? $promo->title),
                    'url' => route('promotions', ['lang' => app()->getLocale()]),
                    'availability' => 'https://schema.org/InStoreOnly',
                    'validFrom' => optional($promo->starts_at)->toDateString() ?? date('Y-m-d'),
                    'validThrough' => optional($promo->ends_at)->toDateString() ?? null,
                ];
            })->toArray(),
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        return view('livewire.pages.promotions', [
            'promotions' => $promotions,
        ])->layout('layouts.app', [
            'title' => 'Промоции и бонуси - Casino Ritz',
            'description' => 'Открийте актуални казино бонуси в Casino Ritz — free spins, cashback, VIP оферти и mystery награди за лоялни играчи.',
            'keywords' => 'казино бонуси, casino bonus, промоции казино, cashback, free spins, mystery jackpot, Casino Ritz оферти',
            'author' => 'Casino Ritz Marketing Team',
            'robots' => 'index, follow',
            'ogType' => 'website',
            'image' => asset('images/logo.png'),
            'twitter' => '@casinoritz',
            'jsonLd' => $jsonLd,
        ]);
    }
}
