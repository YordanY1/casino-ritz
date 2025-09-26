<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class GalleryInterior extends Component
{
    public function render()
    {
        $jsonLd = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => 'Интериорна галерия - Casino Ritz',
            'description' => 'Интериорът на Casino Ritz впечатлява с комбинация от барокова пищност, модерен дизайн и луксозна атмосфера – едно от най-елегантните казина в България.',
            'url' => url()->current(),
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        return view('livewire.pages.gallery-interior')->layout('layouts.app', [
            'title' => 'Интериорна галерия - Casino Ritz',
            'description' => 'Разгледайте описанието на интериора в Casino Ritz – комбинация от барокова елегантност и съвременен комфорт в сърцето на Пловдив.',
            'keywords' => 'casino ritz, интериор, казино пловдив, луксозно казино, бароков стил, галерия',
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
