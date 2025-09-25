<div>
    {{-- Hero Slider --}}
    <section class="relative text-center text-ritz-text-main overflow-hidden">
        <div x-data="{ active: 0, images: ['{{ asset('images/slot-bg-1.jpg') }}', '{{ asset('images/slot-bg-2.jpg') }}'] }" x-init="setInterval(() => active = (active + 1) % images.length, 5000)" class="relative h-[75vh] w-full">

            <template x-for="(img, index) in images" :key="index">
                <div x-show="active === index" x-transition:enter="transition ease-out duration-1000"
                    x-transition:enter-start="opacity-0 scale-105" x-transition:enter-end="opacity-100 scale-100"
                    class="absolute inset-0">
                    <img :src="img" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/70"></div>
                </div>
            </template>

            <div class="absolute inset-0 flex flex-col items-center justify-center z-10 px-6">
                <h1
                    class="text-5xl md:text-6xl font-extrabold text-transparent bg-clip-text
                           bg-gradient-to-r from-ritz-gold via-ritz-red to-ritz-gold
                           drop-shadow-[0_0_50px_#daa520] animate-pulse tracking-wider uppercase">
                    {{ __('slot.title') }}
                </h1>
                <span class="mt-4 text-lg text-ritz-gold-light animate-bounce">✦ ✦ ✦</span>
            </div>
        </div>
    </section>

    {{-- Mysteries --}}
    <section class="relative py-24 bg-ritz-bg">
        <livewire:pages.mysteries />
    </section>

    {{-- Slot description --}}
    <section class="relative bg-ritz-nav py-20 px-6 text-ritz-text-main">
        <div class="max-w-5xl mx-auto space-y-6 text-lg leading-relaxed text-center">
            <h2
                class="text-3xl md:text-4xl font-extrabold text-ritz-gold mb-6 drop-shadow-[0_0_25px_#daa520] uppercase tracking-widest">
                {{ __('slot.heading') }}
            </h2>

            <p class="drop-shadow-md">{{ __('slot.p1') }}</p>
            <p class="drop-shadow-md">{{ __('slot.p2') }}</p>
            <p class="drop-shadow-md">{{ __('slot.p3') }}</p>
            <p class="drop-shadow-md">{{ __('slot.p4') }}</p>
            <p class="drop-shadow-md">{{ __('slot.p5') }}</p>
            <p class="drop-shadow-md">{{ __('slot.p6') }}</p>
        </div>
    </section>

    {{-- Partners --}}
    <section class="relative bg-ritz-nav py-24 px-6">
        <div class="max-w-7xl mx-auto text-center">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-10 items-center justify-center">
                @foreach ([['img' => 'merkur-gamin.png', 'name' => 'Merkur Gaming', 'url' => 'https://merkur-gaming.com'], ['img' => 'alf-str.png', 'name' => 'Alfastreet', 'url' => 'https://www.alfastreet.si/'], ['img' => 'egt.png', 'name' => 'EGT', 'url' => 'https://www.egt.com/'], ['img' => 'novomatic.png', 'name' => 'Novomatic', 'url' => 'https://www.novomatic.com/'], ['img' => 'amatix.png', 'name' => 'Amatic', 'url' => 'https://www.amatic.com/'], ['img' => 'ct-gaming-logo171165984.png', 'name' => 'CT Gaming', 'url' => 'https://www.ctgaming.com/'], ['img' => 'apex.png', 'name' => 'Apex', 'url' => 'https://www.apex-gaming.com/']] as $partner)
                    <a href="{{ $partner['url'] }}" target="_blank"
                        class="relative group flex items-center justify-center p-6 bg-ritz-bg rounded-xl border-2 border-ritz-gold
           shadow-lg hover:scale-110 transform transition duration-500 hover:shadow-[0_0_50px_#daa520]">

                        {{-- Stars (Vegas lights) --}}
                        <span class="absolute -top-2 -left-2 text-ritz-gold animate-ping">✦</span>
                        <span class="absolute -top-3 right-3 text-ritz-red animate-bounce">✧</span>
                        <span class="absolute bottom-2 -right-2 text-ritz-gold-light animate-pulse">✦</span>

                        {{-- Logo --}}
                        <img src="{{ asset('images/partners/' . $partner['img']) }}" alt="{{ $partner['name'] }}"
                            class="relative z-10 max-h-20 object-contain opacity-80 group-hover:opacity-100
               drop-shadow-[0_0_25px_#daa520] group-hover:drop-shadow-[0_0_40px_#ffd700] transition duration-500" />
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</div>
