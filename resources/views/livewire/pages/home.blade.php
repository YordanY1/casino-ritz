<div>
    <section class="relative text-center py-32 overflow-hidden bg-casino-gradient">
        <div class="absolute inset-0 bg-black/60"></div>

        {{-- Content --}}
        <div class="relative z-10 max-w-4xl mx-auto px-6">
            <h1
                class="text-5xl md:text-6xl font-extrabold text-transparent bg-clip-text
                       bg-gradient-to-r from-ritz-gold via-ritz-yellow to-ritz-white
                       drop-shadow-[0_0_25px_#daa520] animate-pulse mb-6">
                {{ __('home.welcome_title') }}
            </h1>

            <p class="text-lg md:text-xl text-ritz-text-secondary mb-10 leading-relaxed">
                {{ __('home.welcome_subtitle') }}
            </p>


            <a href="{{ route('promotions', app()->getLocale()) }}" wire:navigate
                class="inline-block px-8 py-4 text-lg font-semibold
                      bg-ritz-gold text-ritz-bg rounded-md relative overflow-hidden hover:bg-ritz-yellow transition">
                <span class="relative z-10">{{ __('home.see_promos') }}</span>
                <span
                    class="absolute inset-0 bg-gradient-to-r from-transparent via-white/40 to-transparent
                             translate-x-[-100%] hover:translate-x-[100%] transition-transform duration-700"></span>
            </a>

            {{-- 🎉 Casino Birthday Countdown --}}
            <div x-data="birthdayCountdown('2025-11-21T20:00:00+02:00')" x-init="init()"
                class="mt-16 text-center text-ritz-gold relative z-10 select-none">

                <h2 class="text-4xl md:text-5xl font-extrabold mb-8 text-shimmer drop-shadow-[0_0_15px_#daa520]">
                    🎰 {{ __('home.birthday_countdown') }} 🎂
                </h2>

                <div class="flex justify-center gap-6 md:gap-10 font-mono text-5xl md:text-6xl">
                    <template x-for="(label, index) in ['Days', 'Hours', 'Minutes', 'Seconds']" :key="label">
                        <div class="countdown-box relative">
                            <div class="flip-card">
                                <div class="flip-card-inner" :class="index == 0 ? 'animate-flip' : ''">
                                    <div class="flip-card-front"
                                        :text-content="index == 0 ? days : index == 1 ? hours : index == 2 ? minutes : seconds"
                                        x-text="index==0?days:index==1?hours:index==2?minutes:seconds">
                                    </div>
                                    <div class="flip-card-back"
                                        x-text="index==0?days:index==1?hours:index==2?minutes:seconds"></div>
                                </div>
                            </div>
                            <span class="text-sm uppercase tracking-wider text-ritz-text-secondary block mt-2"
                                x-text="label"></span>
                        </div>
                    </template>
                </div>

                <div x-show="days == 0 && hours == 0 && minutes == 0 && seconds == 0"
                    class="mt-10 text-4xl md:text-5xl font-extrabold text-ritz-gold animate-pulse">
                    🥂 Happy Birthday, Casino Ritz! 🎉
                </div>

                {{-- Light beam effect --}}
                <div class="absolute inset-0 overflow-hidden pointer-events-none">
                    <div
                        class="absolute top-1/2 left-[-25%] w-[150%] h-[2px] bg-gradient-to-r from-transparent via-ritz-gold to-transparent opacity-70 animate-[slide-light_6s_linear_infinite]">
                    </div>
                </div>
            </div>


            {{-- Sparkles --}}
            <div class="absolute top-12 left-1/4 text-ritz-gold animate-ping">✦</div>
            <div class="absolute top-24 right-1/3 text-ritz-yellow animate-pulse">✦</div>
            <div class="absolute bottom-16 left-1/2 text-ritz-gold animate-bounce">✦</div>
        </div>
    </section>

    <section class="relative">
        <div class="h-1 bg-gradient-to-r from-ritz-red via-ritz-gold to-ritz-red shadow-lg"></div>
        <livewire:pages.mysteries />
    </section>

    {{-- Divider + Casino Ritz Experience --}}
    <section class="relative">
        <div class="h-1 bg-gradient-to-r from-ritz-gold via-ritz-red to-ritz-gold shadow-lg"></div>
        <livewire:pages.experience />
    </section>

</div>
