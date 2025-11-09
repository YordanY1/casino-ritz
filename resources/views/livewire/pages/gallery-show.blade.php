<div class="relative bg-ritz-bg py-24 px-6 text-ritz-text-main" x-data="{
    open: false,
    currentImage: null,
    images: @js($images),
    prev() { this.currentImage = (this.currentImage - 1 + this.images.length) % this.images.length },
    next() { this.currentImage = (this.currentImage + 1) % this.images.length }
}" x-init="document.addEventListener('keydown', (e) => {
    if (open) {
        if (e.key === 'ArrowLeft') prev();
        if (e.key === 'ArrowRight') next();
        if (e.key === 'Escape') open = false;
    }
})"
    x-effect="document.body.classList.toggle('overflow-hidden', open)">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-4xl md:text-5xl font-extrabold text-ritz-gold text-center mb-12 uppercase">
            {{ $gallery->translated_title }}
        </h1>

        @if (count($images))
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mb-20">
                <template x-for="(img, index) in images" :key="index">
                    <div
                        class="relative aspect-[4/3] overflow-hidden rounded-lg shadow-lg cursor-pointer hover:scale-105 transform transition">
                        <img :src="img"
                            class="absolute inset-0 w-full h-full object-cover transition duration-500 hover:opacity-90"
                            @click="open = true; currentImage = index">
                    </div>
                </template>
            </div>
        @endif

        @if ($albums->count())
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

    {{--  Lightbox --}}
    <div x-show="open" x-transition.opacity.duration.300ms @click.self="open = false"
        class="fixed inset-0 h-screen w-screen bg-black/90 flex items-center justify-center z-50">
        <button class="absolute top-5 right-5 text-white text-3xl hover:text-ritz-gold"
            @click="open = false">&times;</button>
        <button class="absolute left-4 text-5xl text-white hover:text-ritz-gold px-4 transition"
            @click="prev()">‹</button>

        <img :src="images[currentImage]"
            class="max-h-[90vh] max-w-full mx-auto rounded-lg shadow-2xl object-contain transition duration-300">

        <button class="absolute right-4 text-5xl text-white hover:text-ritz-gold px-4 transition"
            @click="next()">›</button>
    </div>
</div>
