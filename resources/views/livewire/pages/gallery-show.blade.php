<div x-data="{
    open: false,
    currentImage: null,
    images: @js($images),
    prev() {
        this.currentImage = (this.currentImage - 1 + this.images.length) % this.images.length;
    },
    next() {
        this.currentImage = (this.currentImage + 1) % this.images.length;
    }
}" x-init="document.addEventListener('keydown', (e) => {
    if (open) {
        if (e.key === 'ArrowLeft') prev();
        if (e.key === 'ArrowRight') next();
        if (e.key === 'Escape') open = false;
    }
})" x-effect="document.body.classList.toggle('overflow-hidden', open)"
    class="relative bg-ritz-bg py-24 px-6 text-ritz-text-main">

    <div class="max-w-7xl mx-auto">
        <h1 class="text-4xl md:text-5xl font-extrabold text-ritz-gold text-center mb-12 uppercase">
            {{ $gallery->translated_title }}
        </h1>

        {{-- Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <template x-for="(img, index) in images" :key="index">
                <img :src="img"
                    class="rounded-lg shadow-lg cursor-pointer hover:scale-105 transform transition"
                    @click="open = true; currentImage = index">
            </template>
        </div>
    </div>

    {{-- Lightbox --}}
    <div x-show="open" x-transition
        class="fixed inset-0 h-screen w-screen bg-black/90 flex items-center justify-center z-50">
        <button class="absolute top-5 right-5 text-white text-3xl hover:text-ritz-gold"
            @click="open = false">&times;</button>

        <div class="relative max-w-5xl w-full flex items-center justify-center h-full">
            <button class="absolute left-2 text-4xl text-white px-4 hover:text-ritz-gold" @click="prev()">‹</button>

            <img :src="images[currentImage]"
                class="max-h-[90vh] max-w-full mx-auto rounded-lg shadow-2xl object-contain">

            <button class="absolute right-2 text-4xl text-white px-4 hover:text-ritz-gold" @click="next()">›</button>
        </div>
    </div>

    <div class="max-w-7xl mx-auto mb-16">
        @if ($gallery->slug !== 'interior' && $albums->count())
            <h2 class="text-3xl font-extrabold text-ritz-gold mb-8 text-center uppercase">
                {{ __('gallery.albums') }}
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
                @foreach ($albums as $album)
                    <a href="{{ route('album.show', [app()->getLocale(), $gallery->slug, $album->slug]) }}"
                        class="group relative rounded-xl overflow-hidden border-4 border-ritz-gold shadow-lg hover:scale-105 transform transition duration-500">
                        <img src="{{ $album->cover ? Storage::url($album->cover) : asset('images/placeholder.jpg') }}"
                            alt="{{ $album->translated_title }}"
                            class="w-full h-64 object-cover group-hover:opacity-90 transition duration-500">
                        <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
                            <h3 class="text-2xl font-extrabold text-ritz-gold uppercase">
                                {{ $album->translated_title }}
                            </h3>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</div>
