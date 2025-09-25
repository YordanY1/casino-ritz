<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Pages\Home;
use App\Livewire\Pages\About;
use App\Livewire\Pages\LiveGame;
use App\Livewire\Pages\LiveGameShow;
use App\Livewire\Pages\Slot;
use App\Livewire\Pages\Poker;
use App\Livewire\Pages\Gallery;
use App\Livewire\Pages\GalleryInterior;
use App\Livewire\Pages\GalleryEvents;
use App\Livewire\Pages\Contacts;
use App\Livewire\Pages\Promotions;
use App\Livewire\Pages\Careers;
use App\Livewire\Pages\GalleryAlbum;



Route::get('/', Home::class)->name('home');
Route::get('/about', About::class)->name('about');
Route::get('/{lang}/live-game', LiveGame::class)->name('live-game');
Route::get('/{lang}/live-games/{slug}', LiveGameShow::class)
    ->where('slug', 'caribbean-stud-poker')
    ->name('livegame.show');
Route::get('/{lang}/slot', Slot::class)->name('slot');
Route::get('/{lang}/poker', Poker::class)->name('poker');
Route::get('/{lang}/gallery', Gallery::class)->name('gallery');

Route::get('/{lang}/gallery/interior', GalleryInterior::class)
    ->name('gallery.interior');

Route::get('/{lang}/gallery/events', GalleryEvents::class)
    ->name('gallery.events');

Route::get('{lang}/gallery/events/{album}', GalleryAlbum::class)
    ->name('gallery.album');
Route::get('/{lang}/contacts', Contacts::class)->name('contacts');
Route::get('/{lang}/promotions', Promotions::class)->name('promotions');
Route::get('/{lang}/careers', Careers::class)->name('careers');
