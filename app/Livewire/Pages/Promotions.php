<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Promotion;

class Promotions extends Component
{
    public function render()
    {
        $locale = app()->getLocale();

        $promotions = Promotion::where('locale', $locale)
            ->latest()
            ->get();

        if ($promotions->isEmpty()) {
            $promotions = Promotion::where('locale', 'en')->latest()->get();
        }


        $jsonLd = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'ItemList',
            'name' => 'Промоции и бонуси в Casino Ritz',
            'description' => 'Актуални казино бонуси, промоции и специални оферти от Casino Ritz – безплатни завъртания, cashback и VIP награди.',
            'itemListElement' => $promotions->map(function ($promo, $index) {
                return [
                    '@type' => 'ListItem',
                    'position' => $index + 1,
                    'name' => $promo->title,
                    'url' => route('promotions', ['lang' => app()->getLocale()]),
                ];
            })->toArray(),
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        return view('livewire.pages.promotions', [
            'promotions' => $promotions,
        ])->layout('layouts.app', [
            'title' => 'Промоции и бонуси - Casino Ritz',
            'description' => 'Открийте всички актуални промоции и казино бонуси в Casino Ritz. Безплатни завъртания, джакпот награди, cashback и ексклузивни оферти за редовни играчи.',
            'keywords' => 'казино бонуси, промоции, безплатни завъртания, cashback, Casino Ritz, оферти',
            'author' => 'Casino Ritz Team',
            'robots' => 'index, follow',
            'revisitAfter' => '7 days',
            'ogType' => 'website',
            'image' => asset('images/promotions.jpg'),
            'twitter' => '@casinoritz',
            'jsonLd' => $jsonLd,
        ]);
    }
}
