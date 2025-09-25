<footer class="relative text-ritz-text-main bg-cover bg-center py-24 md:py-32"
    style="background-image: url('{{ asset('images/footer-bg.jpg') }}');">

    <div class="absolute inset-0 bg-black/75"></div>

    <div class="relative z-10 max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-12 px-6">

        <div>
            <h3 class="text-2xl font-bold text-ritz-gold mb-6">{{ __('footer.contacts') }}</h3>

            <p class="flex items-center gap-3 text-lg mb-2">
                <i class="fa-solid fa-phone text-ritz-red"></i>
                <a href="tel:+359888508583" class="hover:text-ritz-gold transition">
                    088 850 8583
                </a>
            </p>

            <p class="flex items-center gap-3 text-lg mb-2">
                <i class="fa-solid fa-location-dot text-ritz-red"></i>
                <a href="https://maps.google.com/?q=Пловдив, Ул. Васил Левски 11" target="_blank"
                    class="hover:text-ritz-gold transition">
                    гр. Пловдив, Ул. "Васил Левски" №11
                </a>
            </p>

            <p class="flex items-center gap-3 text-lg">
                <i class="fa-solid fa-envelope text-ritz-red"></i>
                <a href="mailto:casinoritz@casino-ritz.eu" class="hover:text-ritz-gold transition">
                    casinoritz@casino-ritz.eu
                </a>
            </p>
        </div>

        <div>
            <h3 class="text-2xl font-bold text-ritz-gold mb-6">{{ __('footer.subscribe') }}</h3>
            <p class="text-base text-ritz-text-secondary mb-6 leading-relaxed">
                {{ __('footer.subscribe_text') }}
            </p>
            <form class="flex w-full gap-3">
                <input type="email" placeholder="{{ __('footer.email') }}"
                    class="flex-grow px-6 py-5 rounded-lg bg-ritz-nav/90 text-white text-lg md:text-xl
               border-2 border-ritz-gold focus:outline-none focus:ring-2 focus:ring-ritz-red
               placeholder-ritz-text-secondary shadow-lg">

                <button type="submit"
                    class="px-10 py-5 bg-gradient-to-r from-ritz-gold to-ritz-red
               text-white font-extrabold text-lg md:text-xl rounded-lg
               shadow-[0_0_20px_#daa520] hover:scale-105 transform transition uppercase tracking-wide">
                    {{ __('footer.subscribe_btn') }}
                </button>
            </form>

        </div>

        <div class="flex flex-col items-center md:items-end justify-center">
            <p class="text-lg font-semibold text-ritz-gold mb-4">"Casino Ritz винаги дава повече!"</p>
            <div class="flex gap-6 text-3xl">
                <a href="https://www.facebook.com/Ritzcasino" class="hover:text-ritz-gold transition"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.instagram.com/ritzstarcasino/" class="hover:text-ritz-gold transition"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <div class="relative border-t border-ritz-nav mt-12 pt-6 text-center text-base text-ritz-text-secondary z-10">
        © {{ now()->year }} | Casino Ritz | {{ __('footer.rights') }}
    </div>
</footer>
