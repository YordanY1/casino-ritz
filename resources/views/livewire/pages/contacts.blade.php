<div>
    {{-- Hero --}}
    <section class="relative text-center text-ritz-text-main bg-cover bg-center py-32 px-6"
        style="background-image: url('{{ asset('images/contacts-bg.jpg') }}');">
        <div class="absolute inset-0 bg-black/70"></div>
        <div class="relative z-10 max-w-4xl mx-auto">
            <h1
                class="text-5xl md:text-6xl font-extrabold text-ritz-gold drop-shadow-[0_0_40px_#daa520] uppercase animate-pulse">
                {{ __('contacts.title') }}
            </h1>
        </div>
    </section>

    {{-- Contact Info --}}
    <section class="relative bg-ritz-bg py-24 px-6 text-ritz-text-main">
        <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-12 text-center">

            {{-- Phone --}}
            <div class="flex flex-col items-center gap-4">
                <i class="fa-solid fa-phone text-4xl text-ritz-gold drop-shadow-[0_0_15px_#daa520]"></i>
                <h3 class="text-2xl font-bold text-ritz-gold">{{ __('contacts.phone') }}</h3>
                <a href="tel:{{ __('contacts.phone_number_raw') }}"
                    class="text-lg font-semibold hover:text-ritz-gold transition">
                    {{ __('contacts.phone_number') }}
                </a>
            </div>

            {{-- Email --}}
            <div class="flex flex-col items-center gap-4">
                <i class="fa-solid fa-envelope text-4xl text-ritz-gold drop-shadow-[0_0_15px_#daa520]"></i>
                <h3 class="text-2xl font-bold text-ritz-gold">{{ __('contacts.email') }}</h3>
                <a href="mailto:{{ __('contacts.email_address') }}"
                    class="text-lg font-semibold hover:text-ritz-gold transition">
                    {{ __('contacts.email_address') }}
                </a>
            </div>

            {{-- Location --}}
            <div class="flex flex-col items-center gap-4">
                <i class="fa-solid fa-location-dot text-4xl text-ritz-gold drop-shadow-[0_0_15px_#daa520]"></i>
                <h3 class="text-2xl font-bold text-ritz-gold">{{ __('contacts.location') }}</h3>
                <p class="text-lg">
                    {{ __('contacts.city') }} <br>
                    {{ __('contacts.address') }}
                </p>
            </div>
        </div>
    </section>

    {{-- Google Maps --}}
    <section class="relative bg-ritz-nav py-16 px-6 text-center">
        <div class="max-w-6xl mx-auto">
            <h2
                class="text-3xl md:text-4xl font-extrabold text-ritz-gold mb-8 drop-shadow-[0_0_25px_#daa520] uppercase">
                {{ __('contacts.find_us') }}
            </h2>
            <div class="w-full h-[450px] rounded-xl overflow-hidden shadow-2xl border-4 border-ritz-gold">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2933.204034367881!2d24.740248476220414!3d42.15764647120825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14acd193f9a9eae5%3A0xe8b197fde1413d45!2z0KDQsNC60YPQvNC90YvQuSDQodC-0YDQuNGH!5e0!3m2!1sbg!2sbg!4v1727100000000!5m2!1sbg!2sbg"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>
</div>
