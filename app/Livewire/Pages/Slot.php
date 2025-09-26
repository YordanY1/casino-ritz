<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Slot extends Component
{
    public function render()
    {
        $jsonLd = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => 'Слот игри в Казино Риц',
            'description' => 'Над 210 слот машини от водещи производители – EGT, Novomatic, CT Gaming, IGT и още. Уникални джакпоти и мистерии в Casino Ritz.',
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'Casino Ritz',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('images/logo.png')
                ]
            ],
            'url' => url('/slot'),
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        return view('livewire.pages.slot')
            ->layout('layouts.app', [
                'title' => 'Слот игри - Casino Ritz',
                'description' => 'Изживейте тръпката от над 210 слот машини в Казино Риц – EGT, Novomatic, Merkur, Amatic, Alfastreet и още! Прогресивни джакпоти и луксозна атмосфера в Пловдив.',
                'keywords' => 'слот, слот игри, казино автомати, ротативки, джакпоти, Casino Ritz',
                'author' => 'Casino Ritz Team',
                'robots' => 'index, follow',
                'revisitAfter' => '7 days',
                'ogType' => 'website',
                'image' => asset('images/slot-machines.jpg'),
                'twitter' => '@casinoritz',
                'jsonLd' => $jsonLd,
            ]);
    }
}
