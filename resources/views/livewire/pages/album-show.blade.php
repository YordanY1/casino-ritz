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
</div>
