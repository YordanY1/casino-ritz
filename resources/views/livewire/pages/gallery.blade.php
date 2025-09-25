<div>
    {{-- Hero --}}
    <section class="relative text-center text-ritz-text-main bg-cover bg-center py-32 px-6"
        style="background-image: url('{{ asset('images/footer-bg.jpg') }}');">
        <div class="absolute inset-0 bg-black/70"></div>
        <div class="relative z-10 max-w-4xl mx-auto">
            <h1
                class="text-5xl md:text-6xl font-extrabold text-ritz-gold drop-shadow-[0_0_40px_#daa520] uppercase animate-pulse">
                {{ __('gallery.title') }}
            </h1>
        </div>
    </section>

    {{-- Galleries --}}
    <section class="relative bg-ritz-bg py-24 px-6 text-ritz-text-main">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12">

            <a href="{{ route('gallery.interior', app()->getLocale()) }}" wire:navigate
                class="group relative rounded-xl overflow-hidden shadow-lg border-4 border-ritz-gold hover:scale-105 transform transition duration-500 block">
                <img src="{{ asset('images/live.jpg') }}" alt="{{ __('gallery.interior') }}"
                    class="w-full h-96 object-cover group-hover:opacity-90 transition duration-500">
                <div class="absolute inset-0 bg-black/50 group-hover:bg-black/30 transition"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <h2 class="text-3xl font-extrabold text-ritz-gold drop-shadow-[0_0_20px_#daa520] uppercase">
                        {{ __('gallery.interior') }}
                    </h2>
                </div>
            </a>

            <a href="{{ route('gallery.events', app()->getLocale()) }}" wire:navigate
                class="group relative rounded-xl overflow-hidden shadow-lg border-4 border-ritz-gold hover:scale-105 transform transition duration-500 block">
                <img src="{{ asset('images/events.jpg') }}" alt="{{ __('gallery.events') }}"
                    class="w-full h-96 object-cover group-hover:opacity-90 transition duration-500">
                <div class="absolute inset-0 bg-black/50 group-hover:bg-black/30 transition"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <h2 class="text-3xl font-extrabold text-ritz-gold drop-shadow-[0_0_20px_#daa520] uppercase">
                        {{ __('gallery.events') }}
                    </h2>
                </div>
            </a>

        </div>
    </section>
</div>
