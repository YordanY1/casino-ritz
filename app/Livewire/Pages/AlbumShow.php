<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Album;

class AlbumShow extends Component
{
    public $album;

    public function mount($lang, $gallery, $album)
    {
        $this->album = Album::where('slug', $album)
            ->whereHas('gallery', fn($q) => $q->where('slug', $gallery))
            ->with(['photos', 'gallery'])
            ->firstOrFail();
    }

    public function render()
    {
        $images = $this->album->photos->pluck('path')
            ->map(fn($img) => \Storage::url($img))
            ->toArray();

        $imageGallerySchema = [
            '@type' => 'ImageGallery',
            'name' => $this->album->title,
            'description' => $this->album->description ?? 'Албум от Casino Ritz Пловдив',
            'url' => url()->current(),
            'image' => collect($images)->map(fn($img) => [
                '@type' => 'ImageObject',
                'url' => $img,
                'contentUrl' => $img,
                'caption' => $this->album->title . ' — Casino Ritz Пловдив',
            ])->toArray()
        ];

        return view('livewire.pages.album-show', [
            'album' => $this->album,
            'images' => $images,
        ])->layout('layouts.app', [

            'title' => $this->album->title . ' — Галерия Casino Ritz Пловдив',
            'description' => $this->album->description ?? 'Разгледайте снимки от събития, турнири и специални вечери в Casino Ritz Пловдив.',
            'ogType' => 'article',
            'image' => $images[0] ?? asset('images/logo.png'),
            'author' => 'Casino Ritz Team',

            'breadcrumb' => [
                ['name' => 'Начало', 'url' => url('/')],
                ['name' => 'Галерия', 'url' => url('/gallery')],
                ['name' => $this->album->title, 'url' => url()->current()],
            ],

            'schema' => [
                '@type' => 'WebPage',
                'name' => $this->album->title,
                'description' => $this->album->description ?? 'Фото албум от Casino Ritz Пловдив.',
            ],

            'gallerySchema' => $imageGallerySchema,

            'organizationSchema' => [
                '@type' => 'Organization',
                'name' => 'Casino Ritz',
                'url' => url('/'),
                'logo' => asset('images/logo.png'),
                'sameAs' => [
                    'https://www.facebook.com/Ritzcasino',
                    'https://www.instagram.com/ritzstarcasino/',
                ],
                'contactPoint' => [
                    '@type' => 'ContactPoint',
                    'telephone' => '+359888508583',
                    'contactType' => 'customer service',
                    'areaServed' => 'BG',
                    'availableLanguage' => ['Bulgarian', 'English'],
                ]
            ],
        ]);
    }
}
