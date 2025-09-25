<div class="relative bg-ritz-bg text-ritz-text-main py-20 px-6">
    <div class="max-w-5xl mx-auto space-y-10">

        <div class="text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold text-ritz-gold drop-shadow-[0_0_25px_#daa520] mb-6">
                {{ $game['title'] }}
            </h1>
            <img src="{{ asset('images/live-games/' . $game['img']) }}" alt="{{ $game['title'] }}"
                class="mx-auto rounded-lg shadow-[0_0_30px_#daa520] w-full max-w-3xl">
        </div>


        <p class="text-lg md:text-xl leading-relaxed text-ritz-text-secondary text-center">
            {{ $game['intro'] }}
        </p>


        <div
            class="bg-ritz-nav/80 p-6 rounded-lg shadow-lg border border-ritz-gold space-y-4 text-ritz-text-secondary leading-relaxed">
            {!! nl2br(e($game['full_text'])) !!}
        </div>

        <div class="bg-ritz-nav/80 p-6 rounded-lg shadow-lg border border-ritz-gold">
            <h2 class="text-2xl font-bold text-ritz-gold mb-4">Схема за изплащане</h2>
            <table class="w-full text-left border-collapse">
                <tbody>
                    @foreach ($game['payouts'] as $multiplier => $hand)
                        <tr class="border-b border-ritz-gold/30">
                            <td class="py-2 font-bold text-ritz-gold">{{ $multiplier }}</td>
                            <td class="py-2 text-ritz-text-secondary">{{ $hand }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <div class="bg-ritz-nav/80 p-6 rounded-lg shadow-lg border border-ritz-gold">
            <h2 class="text-2xl font-bold text-ritz-gold mb-4">Бонус залог</h2>
            <ul class="list-decimal list-inside space-y-2 text-ritz-text-secondary">
                @foreach ($game['bonus_bet'] as $bonus)
                    <li>{{ $bonus }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
