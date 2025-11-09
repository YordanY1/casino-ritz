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
        <h1 class="text-4xl md:text-5xl font-extrabold text-ritz-gold text-center uppercase mb-4">
            {{ $album->gallery->translated_title }}
        </h1>

        <h2 class="text-2xl md:text-3xl font-bold text-center text-ritz-text-main uppercase mb-12">
            {{ $album->title }}
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <template x-for="(img, index) in images" :key="index">
                <img :src="img"
                    class="rounded-lg shadow-lg cursor-pointer hover:scale-105 transform transition"
                    @click="open = true; currentImage = index">
            </template>
        </div>
    </div>

    <div x-show="open" x-transition.opacity.duration.300ms @click.self="open = false"
        class="fixed inset-0 h-screen w-screen bg-black/90 flex items-center justify-center z-50">
        <!-- Close -->
        <button
            class="absolute top-5 right-5 text-white text-4xl hover:text-ritz-gold z-[10000] active:scale-95 transition"
            @click="open = false" x-on:touchstart.stop.prevent="open = false">
            &times;
        </button>

        <!-- Prev -->
        <button class="absolute left-4 text-5xl text-white hover:text-ritz-gold px-4 transition select-none"
            @click="prev()" x-on:touchstart.stop.prevent="prev()">
            ‹
        </button>

        <!-- Current Image -->
        <img x-show="currentImage !== null" :src="images[currentImage]"
            class="max-h-[90vh] max-w-full mx-auto rounded-lg shadow-2xl object-contain transition-opacity duration-300">

        <!-- Next -->
        <button class="absolute right-4 text-5xl text-white hover:text-ritz-gold px-4 transition select-none"
            @click="next()" x-on:touchstart.stop.prevent="next()">
            ›
        </button>
    </div>

</div>
