<div>
    {{-- Poker Games Grid --}}
    <section class="relative bg-ritz-bg py-24 px-6 text-ritz-text-main">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10">

            {{-- Texas Hold’em --}}
            <div class="relative group rounded-xl overflow-hidden shadow-lg border-4 border-ritz-gold">
                <img src="{{ asset('images/poker-bg-2.jpg') }}" alt="Texas Hold’em"
                    class="w-full h-96 object-cover transform group-hover:scale-110 transition duration-700">
                <div class="absolute inset-0 bg-black/70 group-hover:bg-black/50 transition"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center px-6 text-center space-y-4">
                    <h2
                        class="text-3xl md:text-4xl font-extrabold text-ritz-gold drop-shadow-[0_0_25px_#daa520] uppercase">
                        Texas Hold’em
                    </h2>
                    <p class="text-base text-ritz-text-secondary leading-relaxed">
                        {{ __('poker.texas') }}
                    </p>
                </div>
            </div>

            {{-- Pot-Limit Omaha --}}
            <div class="relative group rounded-xl overflow-hidden shadow-lg border-4 border-ritz-gold">
                <img src="{{ asset('images/poker-bg-1.jpg') }}" alt="Pot-Limit Omaha"
                    class="w-full h-96 object-cover transform group-hover:scale-110 transition duration-700">
                <div class="absolute inset-0 bg-black/70 group-hover:bg-black/50 transition"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center px-6 text-center space-y-4">
                    <h2
                        class="text-3xl md:text-4xl font-extrabold text-ritz-gold drop-shadow-[0_0_25px_#daa520] uppercase">
                        Pot-Limit Omaha
                    </h2>
                    <p class="text-base text-ritz-text-secondary leading-relaxed">
                        {{ __('poker.omaha') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Monthly Tournament --}}
    <section class="relative bg-ritz-nav py-16 px-6 text-center">
        <div class="max-w-4xl mx-auto space-y-8">
            <h2
                class="text-3xl md:text-4xl font-extrabold text-ritz-gold mb-6 drop-shadow-[0_0_25px_#daa520] uppercase">
                {{ __('poker.monthly_title') }}
            </h2>
            <p class="text-lg md:text-xl text-ritz-text-secondary leading-relaxed">
                {{ __('poker.monthly_desc') }}
            </p>

            {{-- Action Buttons --}}
            <div class="flex flex-col md:flex-row justify-center gap-6">
                <button
                    class="cursor-pointer flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-ritz-gold to-ritz-red
               text-lg font-extrabold rounded-lg shadow-[0_0_25px_#daa520] hover:scale-110 transform
               transition uppercase tracking-wide">
                    <i class="fa-solid fa-dice text-xl text-white animate-pulse drop-shadow-[0_0_10px_#daa520]"></i>
                    {{ __('poker.btn_tournaments') }}
                </button>
                <button
                    class="cursor-pointer flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-ritz-red to-ritz-gold
               text-lg font-extrabold rounded-lg shadow-[0_0_25px_#c41e3a] hover:scale-110 transform
               transition uppercase tracking-wide">
                    <i class="fa-solid fa-spade text-xl text-white animate-pulse drop-shadow-[0_0_10px_#daa520]"></i>
                    {{ __('poker.btn_live') }}
                </button>
                <button
                    class="cursor-pointer flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-ritz-gold to-ritz-red
               text-lg font-extrabold rounded-lg shadow-[0_0_25px_#daa520] hover:scale-110 transform
               transition uppercase tracking-wide">
                    <i class="fa-solid fa-phone text-xl text-white animate-pulse drop-shadow-[0_0_10px_#daa520]"></i>
                    {{ __('poker.btn_contact') }}
                </button>
            </div>

        </div>
    </section>
</div>
