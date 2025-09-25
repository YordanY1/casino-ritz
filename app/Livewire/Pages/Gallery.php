<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Gallery as GalleryModel;


class Gallery extends Component
{
    public function render()
    {
        $galleries = GalleryModel::latest()->get();

        return view('livewire.pages.gallery', [
            'galleries' => $galleries,
        ])->layout('layouts.app', [
            'title' => __('gallery.title')
        ]);
    }
}
