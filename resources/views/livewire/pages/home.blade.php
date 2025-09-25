<div>
    {{-- Hero секция --}}
    <section class="relative text-center py-32 overflow-hidden bg-casino-gradient">
        <div class="absolute inset-0 bg-black/60"></div>

        {{-- Content --}}
        <div class="relative z-10 max-w-4xl mx-auto px-6">
            <h1
                class="text-5xl md:text-6xl font-extrabold text-transparent bg-clip-text
                       bg-gradient-to-r from-ritz-gold via-ritz-yellow to-ritz-white
                       drop-shadow-[0_0_25px_#daa520] animate-pulse mb-6">
                {{ __('home.welcome_title') }}
            </h1>

            <p class="text-lg md:text-xl text-ritz-text-secondary mb-10 leading-relaxed">
                {{ __('home.welcome_subtitle') }}
            </p>

            {{-- CTA бутон (ако решиш да го върнем) --}}
            {{--
            <a href="{{ route('promos.index', app()->getLocale()) }}" wire:navigate
               class="inline-block px-8 py-4 text-lg font-semibold
                      bg-ritz-gold text-ritz-bg rounded-md relative overflow-hidden hover:bg-ritz-yellow transition">
                <span class="relative z-10">{{ __('home.see_promos') }}</span>
                <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/40 to-transparent
                             translate-x-[-100%] hover:translate-x-[100%] transition-transform duration-700"></span>
            </a>
            --}}

            {{-- Sparkles --}}
            <div class="absolute top-12 left-1/4 text-ritz-gold animate-ping">✦</div>
            <div class="absolute top-24 right-1/3 text-ritz-yellow animate-pulse">✦</div>
            <div class="absolute bottom-16 left-1/2 text-ritz-gold animate-bounce">✦</div>
        </div>
    </section>

    <section class="relative">
        <div class="h-1 bg-gradient-to-r from-ritz-red via-ritz-gold to-ritz-red shadow-lg"></div>
        <livewire:pages.mysteries />
    </section>

    {{-- Divider + Casino Ritz Experience --}}
    <section class="relative">
        <div class="h-1 bg-gradient-to-r from-ritz-gold via-ritz-red to-ritz-gold shadow-lg"></div>
        <livewire:pages.experience />
    </section>

</div>
