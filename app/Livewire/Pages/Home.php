<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.pages.home')
            ->layout('layouts.app', [
                'title' => 'Casino Ritz - Начало',
                'description' => 'Casino Ritz – играй най-добрите казино игри, ротативки и вземи бонуси още днес.',
                'keywords' => 'casino, казино, Casino Ritz, ротативки, бонуси, игри',
                'author' => 'Casino Ritz Team',
                'robots' => 'index, follow',
                'revisitAfter' => '7 days',
                'ogType' => 'website',
                'image' => asset('images/logo.png'),
                'twitter' => '@casinoritz',
            ]);
    }
}
