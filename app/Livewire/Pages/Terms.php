<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Terms extends Component
{
    public function render()
    {
        $jsonLd = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'TermsOfService',
            'name' => 'Общи условия - Casino Ritz',
            'description' => 'Общи условия за ползване на услугите и уебсайта на Casino Ritz. Прочетете правилата и условията за достъп, използване, защита на данните и отговорност.',
            'url' => url()->current(),
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'Casino Ritz',
                'url' => url('/'),
                'logo' => asset('images/logo.png'),
            ]
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

        return view('livewire.pages.terms')
            ->layout('layouts.app', [
                'title' => __('terms.title'),
                'description' => __('terms.intro'),
                'keywords' => 'terms and conditions, общи условия, Casino Ritz',
                'robots' => 'noindex, nofollow',
                'jsonLd' => $jsonLd,
            ]);
    }
}
