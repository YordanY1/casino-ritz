<div class="relative text-center py-20 bg-ritz-nav">
    <h2 class="text-4xl md:text-5xl font-extrabold text-ritz-gold mb-12 drop-shadow-[0_0_25px_#daa520]">
        {{ __('experience.title') }}
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 max-w-6xl mx-auto px-4">
        @foreach ($items as $item)
            @if (isset($item['route']))
                {{-- Internal route --}}
                <a href="{{ route($item['route'], app()->getLocale()) }}" wire:navigate
                    class="relative group rounded-lg overflow-hidden shadow-lg border border-ritz-gold block">
                    <img src="{{ $item['image'] }}" alt="{{ __($item['title']) }}"
                        class="w-full h-48 object-cover transform group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-black/50 group-hover:bg-black/30 transition"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span
                            class="text-2xl font-bold text-ritz-white drop-shadow group-hover:text-ritz-gold transition">
                            {{ __($item['title']) }}
                        </span>
                    </div>
                </a>
            @elseif (isset($item['url']))
                {{-- External URL --}}
                <a href="{{ $item['url'] }}" target="_blank" rel="noopener noreferrer"
                    class="relative group rounded-lg overflow-hidden shadow-lg border border-ritz-gold block">
                    <img src="{{ $item['image'] }}" alt="{{ __($item['title']) }}"
                        class="w-full h-48 object-cover transform group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-black/50 group-hover:bg-black/30 transition"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span
                            class="text-2xl font-bold text-ritz-white drop-shadow group-hover:text-ritz-gold transition">
                            {{ __($item['title']) }}
                        </span>
                    </div>
                </a>
            @else
                {{-- Static card --}}
                <div class="relative group rounded-lg overflow-hidden shadow-lg border border-ritz-gold">
                    <img src="{{ $item['image'] }}" alt="{{ __($item['title']) }}"
                        class="w-full h-48 object-cover transform group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-black/50 group-hover:bg-black/30 transition"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span
                            class="text-2xl font-bold text-ritz-white drop-shadow group-hover:text-ritz-gold transition">
                            {{ __($item['title']) }}
                        </span>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
