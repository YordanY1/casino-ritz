<div>
    <section class="relative text-center text-ritz-text-main bg-cover bg-center py-40 px-6"
        style="background-image: url('{{ asset('images/live-game-bg.jpg') }}');">

        <div class="absolute inset-0 bg-black/70"></div>

        <div class="relative z-10 max-w-4xl mx-auto">
            <h1
                class="text-5xl md:text-6xl font-extrabold text-transparent bg-clip-text
                   bg-gradient-to-r from-ritz-red via-ritz-gold to-ritz-red
                   drop-shadow-[0_0_40px_#c41e3a] animate-pulse mb-8">
                {{ __('livegame.title') }}
            </h1>

            <p class="text-2xl md:text-3xl font-semibold text-ritz-text-secondary mb-12">
                {{ __('livegame.subtitle') }}
            </p>
            <div class="flex flex-col md:flex-row items-center justify-center gap-6">
                {{-- Contact --}}
                <a href="{{ route('contacts', app()->getLocale()) }}" wire:navigate
                    class="relative px-10 py-4 bg-gradient-to-r from-ritz-gold to-ritz-red
               text-xl font-extrabold rounded-lg shadow-[0_0_25px_#daa520]
               hover:scale-110 transform transition cursor-pointer
               uppercase tracking-wide rounded-lg text-center">
                    {{ __('livegame.contact_btn') }}
                </a>

                {{-- Promotions --}}
                <a href="{{ route('promotions', app()->getLocale()) }}" wire:navigate
                    class="relative px-10 py-4 bg-gradient-to-r from-ritz-red to-ritz-gold
               text-xl font-extrabold rounded-lg shadow-[0_0_25px_#c41e3a]
               hover:scale-110 transform transition cursor-pointer
               uppercase tracking-wide rounded-lg text-center">
                    {{ __('livegame.promo_btn') }}
                </a>
            </div>

        </div>
    </section>

    <section class="relative bg-ritz-bg py-24 px-6">
        <div class="max-w-7xl mx-auto">
            <h2
                class="text-4xl md:text-5xl font-extrabold text-ritz-gold text-center mb-16 drop-shadow-[0_0_25px_#daa520]">
                {{ __('livegame.games_title') }}
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-12">
                @foreach ([['img' => 'carribian-stud-poker.jpg', 'name' => 'Caribbean Stud Poker', 'slug' => 'caribbean-stud-poker'], ['img' => 'american-roulete.jpg', 'name' => 'American Roulette'], ['img' => 'blackjek.jpg', 'name' => 'Blackjack'], ['img' => 'russian-poker.jpg', 'name' => 'Russian Poker'], ['img' => 'holdem.jpg', 'name' => 'Texas Hold\'em'], ['img' => 'three-card-pocker.jpg', 'name' => 'Three Card Poker'], ['img' => 'TEXAS-BOBUS-POKER.JPG', 'name' => 'Texas Bonus Poker']] as $game)
                    @if (isset($game['slug']) && $game['slug'] === 'caribbean-stud-poker')
                        <a href="{{ route('livegame.show', [app()->getLocale(), $game['slug']]) }}" wire:navigate>
                            <div
                                class="group relative rounded-xl overflow-hidden border-4 border-ritz-gold
                                   transform transition duration-500 hover:scale-110 animate-card-pulse">
                                <img src="{{ asset('images/live-games/' . $game['img']) }}" alt="{{ $game['name'] }}"
                                    class="w-full h-72 object-cover group-hover:opacity-90 transition duration-500">
                                <div class="bg-ritz-nav/90 text-center py-4">
                                    <h3
                                        class="text-xl font-extrabold text-ritz-gold drop-shadow-[0_0_15px_#daa520] uppercase tracking-wide">
                                        {{ $game['name'] }}
                                    </h3>
                                </div>
                            </div>
                        </a>
                    @else
                        <div
                            class="group relative rounded-xl overflow-hidden border-4 border-ritz-gold
                               transform transition duration-500 hover:scale-110 animate-card-pulse">
                            <img src="{{ asset('images/live-games/' . $game['img']) }}" alt="{{ $game['name'] }}"
                                class="w-full h-72 object-cover group-hover:opacity-90 transition duration-500">
                            <div class="bg-ritz-nav/90 text-center py-4">
                                <h3
                                    class="text-xl font-extrabold text-ritz-gold drop-shadow-[0_0_15px_#daa520] uppercase tracking-wide">
                                    {{ $game['name'] }}
                                </h3>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
</div>
