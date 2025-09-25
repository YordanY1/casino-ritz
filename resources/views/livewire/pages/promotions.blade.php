<div x-data="{
    open: false,
    currentImage: null,
    images: @js(array_map(fn($img) => asset('images/' . $img), $images)),
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
        {{-- Title --}}
        <h1
            class="text-5xl md:text-6xl font-extrabold text-center mb-16 uppercase
                   bg-gradient-to-r from-ritz-gold via-ritz-red to-ritz-gold
                   bg-clip-text text-transparent drop-shadow-[0_0_40px_#daa520] animate-pulse tracking-widest">
            {{ __('promotions.title') }}
        </h1>

        {{-- Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
            <template x-for="(img, index) in images" :key="index">
                <div class="relative group rounded-xl overflow-hidden border-4 border-ritz-gold
                           shadow-[0_0_30px_#daa520] cursor-pointer hover:scale-105
                           transform transition duration-500 animate-card-pulse"
                    @click="open = true; currentImage = index">

                    <img :src="img"
                        class="w-full h-72 object-cover group-hover:opacity-90 transition duration-500">

                    {{-- Overlay --}}
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent
                                opacity-0 group-hover:opacity-100 flex items-end justify-center p-4 transition">
                        <span
                            class="text-lg font-bold text-ritz-gold uppercase tracking-wide
                                     drop-shadow-[0_0_15px_#daa520] animate-pulse">
                            🎰 Casino Ritz
                        </span>
                    </div>
                </div>
            </template>
        </div>
    </div>

    {{-- Lightbox --}}
    <div x-show="open" x-transition
        class="fixed inset-0 h-screen w-screen bg-black/95 flex items-center justify-center z-50">

        {{-- Close --}}
        <button class="absolute top-5 right-5 text-4xl text-ritz-gold hover:scale-125 transition"
            @click="open = false">&times;</button>

        {{-- Image Viewer --}}
        <div class="relative max-w-6xl w-full flex items-center justify-center h-full px-6">
            {{-- Prev --}}
            <button
                class="absolute left-4 text-5xl text-ritz-gold hover:text-ritz-red px-4
                           drop-shadow-[0_0_15px_#daa520] hover:scale-125 transition"
                @click="prev()">‹</button>

            {{-- Current Image --}}
            <img :src="images[currentImage]"
                class="max-h-[85vh] max-w-full mx-auto rounded-xl shadow-[0_0_50px_#daa520] object-contain
                       border-4 border-ritz-gold animate-fade-in">

            {{-- Next --}}
            <button
                class="absolute right-4 text-5xl text-ritz-gold hover:text-ritz-red px-4
                           drop-shadow-[0_0_15px_#daa520] hover:scale-125 transition"
                @click="next()">›</button>
        </div>
    </div>
</div>
