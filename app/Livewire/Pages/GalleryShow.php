<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Gallery;

class GalleryShow extends Component
{
    public $gallery;

    public function mount($lang, $slug)
    {
        // Зареждаме галерията + нейните албуми + всички снимки
        $this->gallery = Gallery::with(['albums.photos', 'photos'])
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function render()
    {
        // Взимаме всички снимки към тази галерия
        $images = $this->gallery->photos
            ->pluck('path')
            ->flatten()
            ->map(fn($img) => \Storage::url($img))
            ->toArray();

        // ImageGallery Schema
        $gallerySchema = [
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
        ];

        return view('livewire.pages.gallery-show', [
            'gallery' => $this->gallery,
            'images' => $images,
            'albums' => $this->gallery->albums,
        ])->layout('layouts.app', [
            'title' => $this->gallery->translated_title . ' - Галерия Casino Ritz',
            'description' => $this->gallery->description ?? 'Разгледайте галерията на Casino Ritz – ' . $this->gallery->translated_title,
            'robots' => 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1',
            'ogType' => 'website',
            'image' => $images[0] ?? asset('images/logo.png'),
            'twitter' => '@casinoritz',

            'breadcrumb' => [
                ['name' => 'Начало', 'url' => url('/')],
                ['name' => 'Галерия', 'url' => url('/gallery')],
                ['name' => $this->gallery->translated_title, 'url' => url()->current()],
            ],

            'schema' => [
                '@type' => 'WebPage',
                'name' => $this->gallery->translated_title,
                'description' => $this->gallery->description ?? 'Фото галерия в Casino Ritz.',
            ],

            'gallerySchema' => $gallerySchema,

            'organizationSchema' => [
                '@type' => 'Organization',
                'name' => 'Casino Ritz',
                'url' => url('/'),
                'logo' => asset('images/logo.png'),
                'sameAs' => [
                    'https://www.facebook.com/Ritzcasino',
                    'https://www.instagram.com/ritzstarcasino/',
                ]
            ],
        ]);
    }
}
