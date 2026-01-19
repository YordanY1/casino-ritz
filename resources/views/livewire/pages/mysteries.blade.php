<div x-data="{ visible: false }" x-intersect.threshold.20="visible = true" class="relative text-center py-20 bg-ritz-bg">
    <h2 class="text-4xl md:text-5xl font-extrabold text-ritz-gold mb-12
               drop-shadow-[0_0_25px_#daa520]">
        {{ __('mysteries.title') }}
    </h2>

    <div class="grid grid-cols-2 md:grid-cols-5 gap-8 max-w-6xl mx-auto">
        @foreach ($mysteries as $mystery)
            <div class="flex flex-col items-center group" x-data="{
                value: 0,
                target: @js($mystery['value']),
                start() {
                    if (!visible) return;

                    const step = this.target / 60;
                    const interval = setInterval(() => {
                        this.value = Math.min(this.target, this.value + step);
                        if (this.value >= this.target) clearInterval(interval);
                    }, 16);
                }
            }" x-init="$watch('visible', v => v && start())">

                {{-- JACKPOT BOX --}}
                <div :class="visible ? 'animate-card-pulse' : ''"
                    class="relative bg-ritz-nav text-3xl font-extrabold text-ritz-gold
                           w-40 h-28 flex items-center justify-center
                           rounded-lg shadow-lg border-2 border-ritz-gold
                           transform transition duration-300
                           group-hover:scale-110
                           group-hover:shadow-[0_0_25px_#daa520]">

                    {{-- LIGHT SWEEP --}}
                    <span :class="visible ? 'animate-[slide-light_1.4s_ease-in-out]' : ''"
                        class="absolute inset-0 bg-gradient-to-r
                               from-transparent via-ritz-gold-light/20 to-transparent
                               translate-x-[-100%]"></span>

                    {{-- VALUE --}}
                    <span
                        x-text="value.toLocaleString('en-US', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        })"></span>
                </div>

                {{-- CURRENCY --}}
                <p class="mt-2 text-sm font-semibold text-center text-ritz-gold">
                    <span
                        x-text="value.toLocaleString('en-US', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        })"></span>
                    <span class="ml-1 tracking-wider">EUR</span>
                </p>

                {{-- LABEL --}}
                <p
                    class="mt-2 text-[13px] font-bold bg-gradient-to-r
                           from-ritz-gold/40 via-ritz-gold/10 to-transparent
                           text-ritz-gold px-3 py-1 rounded-full shadow-lg
                           border border-ritz-gold/40 tracking-wide">
                    {{ $mystery['label'] }}
                </p>

                {{-- RANGE --}}
                <p class="mt-1 text-xs font-semibold text-ritz-red tracking-wide relative">
                    {{ $mystery['range'] }}
                    <span class="block w-10 h-[2px] bg-ritz-red/60 mx-auto mt-1 rounded-full"></span>
                </p>

            </div>
        @endforeach
    </div>
</div>
