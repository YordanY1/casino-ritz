<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Pages\Home;
use App\Livewire\Pages\About;
use App\Livewire\Pages\LiveGame;
use App\Livewire\Pages\LiveGameShow;
use App\Livewire\Pages\Slot;
use App\Livewire\Pages\Poker;
use App\Livewire\Pages\Gallery;
use App\Livewire\Pages\Contacts;
use App\Livewire\Pages\Promotions;
use App\Livewire\Pages\Careers;
use App\Livewire\Pages\GalleryShow;
use App\Livewire\Pages\AlbumShow;
use App\Livewire\Pages\Privacy;
use App\Livewire\Pages\CookiesPolicy;
use App\Livewire\Pages\Terms;
use App\Livewire\Pages\Disclaimer;




Route::get('/', function () {
    $defaultLang = config('app.locale');
    return redirect()->route('home', ['lang' => $defaultLang]);
});

Route::get('/{lang}', Home::class)->name('home');

Route::get('/{lang}/about', About::class)->name('about');

Route::get('/{lang}/live-game', LiveGame::class)->name('live-game');
Route::get('/{lang}/live-games/{slug}', LiveGameShow::class)
    ->where('slug', 'caribbean-stud-poker')
    ->name('livegame.show');

Route::get('/{lang}/slot', Slot::class)->name('slot');
Route::get('/{lang}/poker', Poker::class)->name('poker');

Route::get('/{lang}/gallery', Gallery::class)->name('gallery');
Route::get('/{lang}/gallery/{slug}', GalleryShow::class)->name('gallery.show');
Route::get('/{lang}/gallery/{gallery}/{album}', AlbumShow::class)->name('album.show');

Route::get('/{lang}/contacts', Contacts::class)->name('contacts');
Route::get('/{lang}/promotions', Promotions::class)->name('promotions');
Route::get('/{lang}/careers', Careers::class)->name('careers');

Route::get('/{lang}/privacy', Privacy::class)->name('privacy');
Route::get('/{lang}/cookies-policy', CookiesPolicy::class)->name('cookies');
Route::get('/{lang}/terms', Terms::class)->name('terms');
Route::get('/{lang}/disclaimer', Disclaimer::class)->name('disclaimer');
