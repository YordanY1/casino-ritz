<div class="relative bg-ritz-bg py-24 px-6 text-ritz-text-main">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-4xl md:text-5xl font-extrabold text-ritz-gold text-center mb-12 uppercase">
            {{ __('gallery.events') }}
        </h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
            @foreach ($albums as $slug => $album)
                <a href="{{ route('gallery.album', [app()->getLocale(), $slug]) }}" wire:navigate
                    class="group relative rounded-xl overflow-hidden shadow-lg border-4 border-ritz-gold cursor-pointer hover:scale-105 transform transition duration-500">
                    <img src="{{ asset('images/' . $album['cover']) }}" alt="{{ $album['title'] }}"
                        class="w-full h-64 object-cover group-hover:opacity-90 transition duration-500">
                    <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                        <h2 class="text-2xl font-extrabold text-ritz-gold uppercase">{{ $album['title'] }}</h2>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
