<section class="relative text-ritz-text-main bg-cover bg-center py-32 px-6"
    style="background-image: url('{{ asset('images/footer-bg.jpg') }}');">

    <div class="absolute inset-0 bg-gradient-to-b from-black/90 via-ritz-nav/80 to-black/90"></div>

    <div class="relative z-10 max-w-7xl mx-auto space-y-16">

        <div class="text-center">
            <h1
                class="text-5xl md:text-6xl font-extrabold text-transparent bg-clip-text
                       bg-gradient-to-r from-ritz-gold via-ritz-gold-light to-ritz-red
                       drop-shadow-[0_0_35px_#daa520] relative inline-block
                       animate-pulse cursor-pointer overflow-hidden group mb-8">

                <span class="relative z-10">
                    {{ __('about.title') }}
                </span>

                <span
                    class="absolute inset-0 bg-gradient-to-r from-transparent via-white/40 to-transparent
                           translate-x-[-100%] group-hover:translate-x-[100%]
                           transition-transform duration-2000"></span>


                <span class="absolute -top-6 left-1/4 text-ritz-gold animate-ping">✦</span>
                <span class="absolute -top-4 right-1/3 text-ritz-red animate-bounce">✧</span>
                <span class="absolute -bottom-6 left-1/2 text-ritz-gold-light animate-pulse">✦</span>
            </h1>

            <p class="text-lg md:text-xl leading-relaxed text-ritz-text-secondary mb-6 drop-shadow-md">
                {{ __('about.description1') }}
            </p>
            <p class="text-lg md:text-xl leading-relaxed text-ritz-text-secondary mb-12 drop-shadow-md">
                {{ __('about.description2') }}
            </p>

            <a href="{{ route('contacts', app()->getLocale()) }}" wire:navigate
                class="relative px-12 py-5 bg-gradient-to-r from-ritz-red via-ritz-gold to-ritz-red
           text-2xl font-extrabold rounded-lg shadow-[0_0_25px_#daa520]
           hover:scale-110 transform transition cursor-pointer overflow-hidden group
           tracking-wide uppercase">

                <span class="relative z-10 drop-shadow-[0_0_10px_#000]">
                    {{ __('about.contact_btn') }}
                </span>

                <span
                    class="absolute inset-0 bg-gradient-to-r from-transparent via-white/40 to-transparent
               translate-x-[-100%] group-hover:translate-x-[100%]
               transition-transform duration-1000"></span>

                <span class="absolute -top-3 left-4 text-ritz-gold animate-bounce">✦</span>
                <span class="absolute -bottom-3 right-6 text-ritz-gold-light animate-ping">✧</span>
            </a>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="relative aspect-video rounded-lg overflow-hidden shadow-[0_0_30px_#daa520]">
                <iframe class="w-full h-full" src="https://www.youtube.com/embed/VmbezQ2q34c?autoplay=0&rel=0"
                    title="Casino Ritz Video" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>

            <div class="space-y-6 text-base md:text-lg leading-relaxed text-ritz-text-secondary">
                <h2 class="text-3xl md:text-4xl font-extrabold text-ritz-gold mb-6 drop-shadow-[0_0_20px_#daa520]">
                    {{ __('about.video_title') }}
                </h2>

                <p class="text-lg text-ritz-text-secondary italic mb-4">
                    {{ __('about.video_subtitle') }}
                </p>

                <p class="border-l-4 border-ritz-gold pl-4">
                    {{ __('about.p1') }}
                </p>
                <p class="border-l-4 border-ritz-red pl-4">
                    {{ __('about.p2') }}
                </p>
                <p class="border-l-4 border-ritz-gold pl-4">
                    {{ __('about.p3') }}
                </p>
                <p class="border-l-4 border-ritz-red pl-4">
                    {{ __('about.p4') }}
                </p>
                <p class="border-l-4 border-ritz-gold pl-4 font-semibold text-ritz-gold-light">
                    {{ __('about.p5') }}
                </p>
            </div>

        </div>
    </div>
    </div>
</section>
