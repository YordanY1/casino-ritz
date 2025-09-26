<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Gallery as GalleryModel;

class Gallery extends Component
{
    public function render()
    {
        $galleries = GalleryModel::latest()->get();

        $jsonLd = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'CollectionPage',
            'name' => 'Галерия - Casino Ritz',
            'description' => 'Разгледайте галерията на Casino Ritz – снимки от интериора, специални събития, турнири и атмосферата на най-луксозното казино в Пловдив.',
            'url' => url()->current(),
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        return view('livewire.pages.gallery', [
            'galleries' => $galleries,
        ])->layout('layouts.app', [
            'title' => 'Галерия - Casino Ritz',
            'description' => 'Галерия със снимки от Casino Ritz – интериор, игрални зали, турнири и специални събития в Пловдив.',
            'keywords' => 'casino ritz, галерия, снимки казино, казино пловдив, интериор казино, турнири',
            'author' => 'Casino Ritz Team',
            'robots' => 'index, follow',
            'revisitAfter' => '7 days',
            'ogType' => 'website',
            'image' => asset('images/gallery-cover.jpg'),
            'twitter' => '@casinoritz',
            'jsonLd' => $jsonLd,
        ]);
    }
}
