<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Gallery as GalleryModel;

class Gallery extends Component
{
    public function render()
    {
        $galleries = GalleryModel::latest()->get();

        $collectionSchema = [
            '@type' => 'CollectionPage',
            'name' => 'Галерия - Casino Ritz',
            'description' => 'Разгледайте галерията на Casino Ritz – снимки от интериора, специални събития, турнири и атмосферата на най-луксозното казино в Пловдив.',
            'url' => url()->current(),
        ];

        return view('livewire.pages.gallery', [
            'galleries' => $galleries,
        ])->layout('layouts.app', [

            'title' => 'Галерия - Casino Ritz Пловдив',
            'description' => 'Галерия със снимки от Casino Ritz – интериор, игрални зали, турнири и специални събития в Пловдив.',
            'robots' => 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1',
            'ogType' => 'website',
            'image' => asset('images/logo.png'),
            'twitter' => '@casinoritz',

            'breadcrumb' => [
                ['name' => 'Начало', 'url' => url('/')],
                ['name' => 'Галерия', 'url' => url('/gallery')],
            ],

            'schema' => [
                '@type' => 'WebPage',
                'name' => 'Галерия Casino Ritz',
                'description' => 'Снимки от интериора, турнирите и атмосферата в Casino Ritz Пловдив.',
            ],
            'collectionSchema' => $collectionSchema,

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
