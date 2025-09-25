<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Promotion;

class Promotions extends Component
{
    public function render()
    {
        $promotions = Promotion::latest()->get();

        return view('livewire.pages.promotions', [
            'promotions' => $promotions,
        ])->layout('layouts.app', [
            'title' => __('promotions.title'),
        ]);
    }
}
