<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Mysteries extends Component
{
    public array $mysteries = [
        ['value' => 2580.15, 'range' => '1 000 – 3 000 BGN'],
        ['value' => 13630.09, 'range' => '15 000 – 30 000 BGN'],
        ['value' => 11763.67, 'range' => '10 000 – 15 000 BGN'],
        ['value' => 2942.54, 'range' => '3 000 – 6 000 BGN'],
        ['value' => 1958.69, 'range' => '2 000 – 4 000 BGN'],
        ['value' => 1273.96, 'range' => '1 000 – 3 000 BGN'],
        ['value' => 1032.86, 'range' => '1 000 – 2 000 BGN'],
        ['value' => 4155.35, 'range' => '3 000 – 5 000 BGN'],
        ['value' => 1925.21, 'range' => '1 000 – 2 000 BGN'],
        ['value' => 8097.41, 'range' => '8 000 – 10 000 BGN'],
    ];

    public function render()
    {
        $jsonLd = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => 'Mystery Jackpots - Casino Ritz',
            'description' => 'Мистери джакпоти в реално време в Казино Риц. Следете наградните фондове и диапазоните – всеки ден нов шанс за изненада!',
            'mainEntity' => [
                '@type' => 'ItemList',
                'itemListElement' => collect($this->mysteries)->map(function ($mystery, $index) {
                    return [
                        '@type' => 'ListItem',
                        'position' => $index + 1,
                        'name' => 'Мистерия ' . ($index + 1),
                        'description' => 'Диапазон: ' . $mystery['range'],
                        'offers' => [
                            '@type' => 'Offer',
                            'price' => $mystery['value'],
                            'priceCurrency' => 'BGN',
                        ]
                    ];
                })->toArray(),
            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        return view('livewire.pages.mysteries')
            ->layout('layouts.app', [
                'title' => 'Мистерии и Джакпоти - Casino Ritz',
                'description' => 'Следете Mystery Jackpot наградите в Casino Ritz – уникални мистерии, прогресивни джакпоти и наградни фондове, които могат да ви изненадат по всяко време!',
                'keywords' => 'казино мистерии, mystery jackpot, казино джакпоти, Casino Ritz',
                'author' => 'Casino Ritz Team',
                'robots' => 'index, follow',
                'revisitAfter' => '7 days',
                'ogType' => 'website',
                'image' => asset('images/mystery-jackpot.jpg'),
                'twitter' => '@casinoritz',
                'jsonLd' => $jsonLd,
            ]);
    }
}
