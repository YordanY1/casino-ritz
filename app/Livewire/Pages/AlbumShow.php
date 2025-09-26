<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Gallery;
use App\Models\Album;

class AlbumShow extends Component
{
    public $album;

    public function mount($lang, $gallery, $album)
    {
        $this->album = Album::where('slug', $album)
            ->whereHas('gallery', fn($q) => $q->where('slug', $gallery))
            ->with('photos')
            ->firstOrFail();
    }

    public function render()
    {
        $images = $this->album->photos->pluck('path')
            ->map(fn($img) => \Storage::url($img))
            ->toArray();

        $jsonLd = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'ImageGallery',
            'name' => $this->album->title,
            'description' => $this->album->description ?? 'Албум от Casino Ritz',
            'url' => url()->current(),
            'image' => collect($images)->map(fn($img) => [
                '@type' => 'ImageObject',
                'url' => $img,
                'contentUrl' => $img,
                'caption' => $this->album->title,
            ])->toArray()
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        return view('livewire.pages.album-show', [
            'album' => $this->album,
            'images' => $images,
        ])->layout('layouts.app', [
            'title' => $this->album->title . ' - Галерия Casino Ritz',
            'description' => $this->album->description ?? 'Разгледайте албума "' . $this->album->title . '" от Casino Ritz – снимки от събития, турнири и специални вечери.',
            'keywords' => 'casino ritz, албум ' . strtolower($this->album->title) . ', галерия казино, снимки казино пловдив',
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
