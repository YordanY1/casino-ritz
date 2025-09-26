<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Gallery;

class GalleryShow extends Component
{
    public $gallery;

    public function mount($lang, $slug)
    {
        $this->gallery = Gallery::with('albums.photos')->where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        $images = [];

        if ($this->gallery->slug === 'interior') {
            $images = $this->gallery->photos->pluck('path')
                ->map(fn($img) => \Storage::url($img))
                ->toArray();
        }

        $jsonLd = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'ImageGallery',
            'name' => $this->gallery->translated_title,
            'description' => $this->gallery->description ?? 'Галерия от Casino Ritz',
            'url' => url()->current(),
            'image' => collect($images)->map(fn($img) => [
                '@type' => 'ImageObject',
                'url' => $img,
                'contentUrl' => $img,
                'representativeOfPage' => true,
                'caption' => $this->gallery->translated_title,
            ])->toArray()
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        return view('livewire.pages.gallery-show', [
            'gallery' => $this->gallery,
            'images' => $images,
            'albums' => $this->gallery->albums,
        ])->layout('layouts.app', [
            'title' => $this->gallery->translated_title . ' - Casino Ritz',
            'description' => $this->gallery->description ?? 'Разгледайте галерията на Casino Ritz – ' . $this->gallery->translated_title,
            'keywords' => 'casino ritz, галерия, ' . strtolower($this->gallery->translated_title),
            'author' => 'Casino Ritz Team',
            'robots' => 'index, follow',
            'revisitAfter' => '7 days',
            'ogType' => 'website',
            'image' => $images[0] ?? asset('images/logo.png'),
            'twitter' => '@casinoritz',
            'jsonLd' => $jsonLd,
        ]);
    }
}
