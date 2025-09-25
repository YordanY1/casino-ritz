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

            @foreach ($galleries as $gallery)
                <a href="{{ route('gallery.show', [app()->getLocale(), $gallery->slug]) }}" wire:navigate
                    class="group relative rounded-xl overflow-hidden shadow-lg border-4 border-ritz-gold hover:scale-105 transform transition duration-500 block">

                    <img src="{{ $gallery->cover ? Storage::url($gallery->cover) : asset('images/placeholder.jpg') }}"
                        alt="{{ $gallery->translated_title }}"
                        class="w-full h-96 object-cover group-hover:opacity-90 transition duration-500">

                    <div class="absolute inset-0 bg-black/50 group-hover:bg-black/30 transition"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <h2 class="text-3xl font-extrabold text-ritz-gold drop-shadow-[0_0_20px_#daa520] uppercase">
                            {{ $gallery->translated_title }}
                        </h2>
                    </div>
                </a>
            @endforeach

        </div>
    </section>
</div>
