<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class LiveGameShow extends Component
{
    public string $slug;

    public array $games = [
        'caribbean-stud-poker' => [
            'title' => 'Caribbean Stud Poker',
            'img'   => 'carribian-stud-poker.jpg',
            'intro' => 'КАРИБИАН КАЗИНО СТЪД ПОКЕР е хазартна игра на игрална маса, с една колода от 52 карти.',
            'full_text' => "
                Влизането в игра се извършва чрез залог, поставен на специално разграфен за целта кръг (анте).
                След влизането в играта, играчът получава пет карти с лицето надолу, а крупието тегли за банката
                четири карти с лицето надолу и пета открита карта. След като играчът разгледа картите си,
                има право да подмени една от тях. Подмяната става като картата се постави с лицето надолу върху масата,
                поставя се залог равен на антето и се получава нова карта от крупието.

                След получаване на новите карти, играчът решава дали да излезе от играта (губи антето),
                или да продължи – удвоявайки направените до момента залози. Ако продължи, крупието
                открива своите четири закрити карти. Крупието играе само с комбинация асо и поп или по-голяма.
                Ако комбинацията на играча е по-силна – печели равна сума (1-1) от анте и бонус по схемата.

                Ако крупието няма комбинация (по-малка от асо и поп), то изплаща само антето (1-1).
                Ако комбинацията на крупието е валидна, но по-силна от тази на играча – играчът губи и антето, и залога.

                Играчът може да направи и страничен залог (БОНУС БЕТ), който носи печалба,
                ако първите пет карти на играча образуват комбинации като Кент флеш роял, Кент флеш, Каре, Фул или Кольор.
            ",
            'payouts' => [
                '1-1'   => '1 чифт или по-малко',
                '2-1'   => 'Два чифта',
                '3-1'   => 'Тройка',
                '4-1'   => 'Кента',
                '5-1'   => 'Кольор',
                '7-1'   => 'Фул',
                '20-1'  => 'Каре',
                '50-1'  => 'Кент флеш',
                '100-1' => 'Кент флеш роял',
            ],
            'bonus_bet' => [
                'КЕНТ ФЛЕШ РОЯЛ',
                'КЕНТ ФЛЕШ',
                'КАРЕ',
                'ФУЛ',
                'КОЛЬОР',
            ]
        ],
    ];

    public function mount(string $slug)
    {
        $this->slug = $slug;

        if (!isset($this->games[$slug])) {
            abort(404);
        }
    }

    public function render()
    {
        $game = $this->games[$this->slug];


        $jsonLd = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Game',
            'name' => $game['title'],
            'description' => $game['intro'],
            'image' => asset('images/' . $game['img']),
            'applicationCategory' => 'Casino Game',
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'Casino Ritz',
                'url' => url('/'),
                'logo' => asset('images/logo.png'),
            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        return view('livewire.pages.live-game-show', [
            'game' => $game,
        ])->layout('layouts.app', [
            'title' => $game['title'] . ' - Casino Ritz',
            'description' => $game['intro'],
            'keywords' => strtolower($game['title']) . ', live game, казино игри, игри на маса, Casino Ritz',
            'author' => 'Casino Ritz Team',
            'robots' => 'index, follow',
            'revisitAfter' => '7 days',
            'ogType' => 'article',
            'image' => asset('images/' . $game['img']),
            'twitter' => '@casinoritz',
            'jsonLd' => $jsonLd,
        ]);
    }
}
