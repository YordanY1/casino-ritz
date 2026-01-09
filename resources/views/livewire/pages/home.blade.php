<div>
    <section
        class="relative text-center overflow-hidden bg-black
           min-h-[65vh] md:min-h-[100dvh] flex items-center">

        {{-- 📱 Mobile Background Video --}}
        <video class="absolute inset-0 w-full h-full object-cover md:hidden" autoplay muted loop playsinline>
            <source src="{{ asset('images/casino-mobile.mp4') }}" type="video/mp4">
        </video>

        {{-- 🖥️ Desktop Background Video --}}
        <video class="absolute inset-0 w-full h-full object-cover hidden md:block md:scale-110" autoplay muted loop
            playsinline>
            <source src="{{ asset('images/casino.mp4') }}" type="video/mp4">
        </video>

        {{-- Overlay --}}
        <div class="absolute inset-0 bg-black/60"></div>

        {{-- Content --}}
        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6">
            <h1
                class="text-4xl sm:text-5xl md:text-7xl font-extrabold text-transparent bg-clip-text
                   bg-gradient-to-r from-ritz-gold via-ritz-yellow to-ritz-white
                   drop-shadow-[0_0_25px_#daa520] mb-4 md:mb-6">
                {{ __('home.welcome_title') }}
            </h1>

            <p
                class="text-base sm:text-lg md:text-2xl text-ritz-text-secondary
                   mb-8 md:mb-12 leading-relaxed">
                {{ __('home.welcome_subtitle') }}
            </p>

            <a href="{{ route('promotions', app()->getLocale()) }}" wire:navigate
                class="inline-block px-6 py-3 sm:px-8 sm:py-4 md:px-10 md:py-5
                   text-base sm:text-lg font-semibold
                   bg-ritz-gold text-ritz-bg rounded-md relative overflow-hidden
                   hover:bg-ritz-yellow transition">
                <span class="relative z-10">{{ __('home.see_promos') }}</span>
                <span
                    class="absolute inset-0 bg-gradient-to-r from-transparent via-white/40 to-transparent
                       translate-x-[-100%] hover:translate-x-[100%]
                       transition-transform duration-700"></span>
            </a>
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
