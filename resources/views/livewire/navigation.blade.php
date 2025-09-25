<nav class="bg-ritz-nav text-ritz-white" x-data="{ mobileOpen: false }">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">
        {{-- Logo --}}
        <a href="{{ route('home', app()->getLocale()) }}" wire:navigate class="flex items-center space-x-3">
            <img src="{{ asset('images/logo.png') }}" alt="Casino RITZ Logo" class="h-14 w-auto">
        </a>

        {{-- Desktop Nav --}}
        <ul class="hidden lg:flex space-x-8 font-semibold uppercase items-center">
            <li><a href="{{ route('home', app()->getLocale()) }}" wire:navigate
                    class="hover:text-ritz-gold">{{ __('navigation.home') }}</a></li>
            <li><a href="{{ route('about', app()->getLocale()) }}" wire:navigate
                    class="hover:text-ritz-gold">{{ __('navigation.about') }}</a></li>

            {{-- Dropdown Games --}}
            <li x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="flex items-center gap-1 hover:text-ritz-gold uppercase">
                    {{ __('navigation.games') }}
                    <i class="fa-solid fa-chevron-down text-xs"></i>
                </button>
                <ul x-show="open" @click.outside="open = false"
                    class="absolute left-0 mt-2 bg-ritz-dark border border-ritz-gold rounded-md shadow-lg z-50 w-44 text-sm">
                    <li><a href="{{ route('live-game', app()->getLocale()) }}" wire:navigate
                            class="block px-4 py-2 hover:bg-ritz-red">{{ __('navigation.live-game') }}</a></li>
                    <li><a href="{{ route('slot', app()->getLocale()) }}" wire:navigate
                            class="block px-4 py-2 hover:bg-ritz-red">{{ __('navigation.slot') }}</a></li>
                    <li><a href="{{ route('poker', app()->getLocale()) }}" wire:navigate
                            class="block px-4 py-2 hover:bg-ritz-red">{{ __('navigation.poker') }}</a></li>
                </ul>
            </li>

            <li><a href="https://www.facebook.com/Ritzstarcasinopoker" target="_blank" rel="noopener"
                    class="hover:text-ritz-gold">{{ __('navigation.tournaments') }}</a></li>
            <li><a href="{{ route('gallery', app()->getLocale()) }}" wire:navigate
                    class="hover:text-ritz-gold">{{ __('navigation.gallery') }}</a></li>
            <li><a href="{{ route('contacts', app()->getLocale()) }}" wire:navigate
                    class="hover:text-ritz-gold">{{ __('navigation.contact') }}</a></li>
            <li><a href="{{ route('promotions', app()->getLocale()) }}" wire:navigate
                    class="hover:text-ritz-gold">{{ __('navigation.promotions') }}</a></li>
            <li><a href="{{ route('careers', app()->getLocale()) }}" wire:navigate
                    class="hover:text-ritz-gold">{{ __('navigation.careers') }}</a></li>
        </ul>

        {{-- Language Switcher Desktop --}}
        <div class="hidden lg:block relative" x-data="{ open: false }">
            <button @click="open = !open"
                class="flex items-center space-x-2 px-3 py-2 bg-ritz-dark border border-ritz-gold rounded-md hover:bg-ritz-red transition">
                @switch(app()->getLocale())
                    @case('bg')
                        <span>🇧🇬 Български</span>
                    @break

                    @case('en')
                        <span>🇬🇧 English</span>
                    @break

                    @case('tr')
                        <span>🇹🇷 Türkçe</span>
                    @break

                    @case('el')
                        <span>🇬🇷 Ελληνικά</span>
                    @break
                @endswitch
                <svg x-bind:class="open ? 'rotate-180' : ''"
                    class="w-4 h-4 text-ritz-gold transform transition-transform duration-200" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <ul x-show="open" @click.outside="open = false" x-transition
                class="absolute right-0 mt-2 w-40 bg-ritz-dark border border-ritz-gold rounded-md shadow-lg overflow-hidden z-50">

                {{-- Български --}}
                <li>
                    <a href="{{ route(Route::currentRouteName(), ['lang' => 'bg'] + request()->route()->parameters()) }}"
                        class="flex items-center px-4 py-2 hover:bg-ritz-red">
                        🇧🇬 Български
                    </a>
                </li>

                {{-- English --}}
                <li>
                    <a href="{{ route(Route::currentRouteName(), ['lang' => 'en'] + request()->route()->parameters()) }}"
                        class="flex items-center px-4 py-2 hover:bg-ritz-red">
                        🇬🇧 English
                    </a>
                </li>

                {{-- Türkçe --}}
                <li>
                    <a href="{{ route(Route::currentRouteName(), ['lang' => 'tr'] + request()->route()->parameters()) }}"
                        class="flex items-center px-4 py-2 hover:bg-ritz-red">
                        🇹🇷 Türkçe
                    </a>
                </li>

                {{-- Ελληνικά --}}
                <li>
                    <a href="{{ route(Route::currentRouteName(), ['lang' => 'el'] + request()->route()->parameters()) }}"
                        class="flex items-center px-4 py-2 hover:bg-ritz-red">
                        🇬🇷 Ελληνικά
                    </a>
                </li>
            </ul>
        </div>


        {{-- Burger button --}}
        <button class="lg:hidden relative w-8 h-8 focus:outline-none" @click="mobileOpen = !mobileOpen">
            <span class="sr-only">Menu</span>
            <span aria-hidden="true"
                class="block absolute h-0.5 w-8 bg-ritz-gold transform transition duration-500 ease-in-out"
                :class="mobileOpen ? 'rotate-45 translate-y-3.5' : '-translate-y-2'"></span>
            <span aria-hidden="true"
                class="block absolute h-0.5 w-8 bg-ritz-gold transform transition duration-500 ease-in-out"
                :class="mobileOpen ? 'opacity-0' : 'opacity-100'"></span>
            <span aria-hidden="true"
                class="block absolute h-0.5 w-8 bg-ritz-gold transform transition duration-500 ease-in-out"
                :class="mobileOpen ? '-rotate-45 -translate-y-3.5' : 'translate-y-2'"></span>
        </button>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="mobileOpen" x-transition class="lg:hidden bg-ritz-dark border-t border-ritz-gold z-50">
        <ul class="flex flex-col space-y-2 p-4 uppercase font-semibold">
            <li><a href="{{ route('home', app()->getLocale()) }}" wire:navigate
                    class="hover:text-ritz-gold">{{ __('navigation.home') }}</a></li>
            <li><a href="{{ route('about', app()->getLocale()) }}" wire:navigate
                    class="hover:text-ritz-gold">{{ __('navigation.about') }}</a></li>

            {{-- Dropdown Games Mobile --}}
            <li x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex justify-between items-center hover:text-ritz-gold">
                    {{ __('navigation.games') }}
                    <i class="fa-solid fa-chevron-down text-xs"></i>
                </button>
                <ul x-show="open" class="pl-4 mt-2 space-y-1">
                    <li><a href="{{ route('live-game', app()->getLocale()) }}" wire:navigate
                            class="block hover:text-ritz-gold">{{ __('navigation.live-game') }}</a></li>
                    <li><a href="{{ route('slot', app()->getLocale()) }}" wire:navigate
                            class="block hover:text-ritz-gold">{{ __('navigation.slot') }}</a></li>
                    <li><a href="{{ route('poker', app()->getLocale()) }}" wire:navigate
                            class="block hover:text-ritz-gold">{{ __('navigation.poker') }}</a></li>
                </ul>
            </li>

            <li><a href="https://www.facebook.com/Ritzstarcasinopoker" target="_blank" rel="noopener"
                    class="hover:text-ritz-gold">{{ __('navigation.tournaments') }}</a></li>
            <li><a href="{{ route('gallery', app()->getLocale()) }}" wire:navigate
                    class="hover:text-ritz-gold">{{ __('navigation.gallery') }}</a></li>
            <li><a href="{{ route('contacts', app()->getLocale()) }}" wire:navigate
                    class="hover:text-ritz-gold">{{ __('navigation.contact') }}</a></li>
            <li><a href="{{ route('promotions', app()->getLocale()) }}" wire:navigate
                    class="hover:text-ritz-gold">{{ __('navigation.promotions') }}</a></li>
            <li><a href="{{ route('careers', app()->getLocale()) }}" wire:navigate
                    class="hover:text-ritz-gold">{{ __('navigation.careers') }}</a></li>
        </ul>
        {{-- Language Switcher Mobile --}}
        <div class="border-t border-ritz-gold mt-4 pt-4 px-4" x-data="{ open: false }">
            <button @click="open = !open"
                class="flex items-center justify-between w-full px-3 py-2 bg-ritz-dark border border-ritz-gold rounded-md hover:bg-ritz-red transition">
                @switch(app()->getLocale())
                    @case('bg')
                        <span>🇧🇬 Български</span>
                    @break

                    @case('en')
                        <span>🇬🇧 English</span>
                    @break

                    @case('tr')
                        <span>🇹🇷 Türkçe</span>
                    @break

                    @case('el')
                        <span>🇬🇷 Ελληνικά</span>
                    @break
                @endswitch
                <svg x-bind:class="open ? 'rotate-180' : ''"
                    class="w-4 h-4 text-ritz-gold transform transition-transform duration-200" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <ul x-show="open" x-transition class="mt-2 space-y-1 bg-ritz-dark border border-ritz-gold rounded-md">
                <li>
                    <a href="{{ route(Route::currentRouteName(), ['lang' => 'bg'] + request()->route()->parameters()) }}"
                        class="block px-4 py-2 hover:bg-ritz-red">🇧🇬 Български</a>
                </li>
                <li>
                    <a href="{{ route(Route::currentRouteName(), ['lang' => 'en'] + request()->route()->parameters()) }}"
                        class="block px-4 py-2 hover:bg-ritz-red">🇬🇧 English</a>
                </li>
                <li>
                    <a href="{{ route(Route::currentRouteName(), ['lang' => 'tr'] + request()->route()->parameters()) }}"
                        class="block px-4 py-2 hover:bg-ritz-red">🇹🇷 Türkçe</a>
                </li>
                <li>
                    <a href="{{ route(Route::currentRouteName(), ['lang' => 'el'] + request()->route()->parameters()) }}"
                        class="block px-4 py-2 hover:bg-ritz-red">🇬🇷 Ελληνικά</a>
                </li>
            </ul>
        </div>

    </div>
</nav>
