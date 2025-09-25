<div>
    {{-- Hero --}}
    <section class="relative text-center text-ritz-text-main bg-cover bg-center py-32 px-6"
        style="background-image: url('{{ asset('images/contacts-bg.jpg') }}');">
        <div class="absolute inset-0 bg-black/70"></div>
        <div class="relative z-10 max-w-4xl mx-auto">
            <h1
                class="text-5xl md:text-6xl font-extrabold text-ritz-gold drop-shadow-[0_0_40px_#daa520] uppercase animate-pulse">
                {{ __('careers.title') }}
            </h1>
            <p class="mt-4 text-lg md:text-xl text-ritz-text-secondary font-medium">
                {{ __('careers.subtitle') }}
            </p>
        </div>
    </section>

    {{-- Careers Form --}}
    <section class="relative bg-ritz-bg py-24 px-6 text-ritz-text-main">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10">

            {{-- Form --}}
            <div class="md:col-span-2 bg-ritz-nav p-8 rounded-xl shadow-2xl border-4 border-ritz-gold">
                <h2 class="text-3xl font-extrabold text-ritz-gold mb-8 uppercase tracking-wide">
                    {{ __('careers.form_title') }}
                </h2>

                @if (session()->has('success'))
                    <div class="mb-6 p-4 bg-green-600 text-white rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <form wire:submit.prevent="submit" class="space-y-6">
                    <input type="text" wire:model="name" placeholder="{{ __('careers.full_name') }}"
                        class="input-ritz">
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <input type="email" wire:model="email" placeholder="{{ __('careers.email') }}" class="input-ritz">
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <input type="text" wire:model="phone" placeholder="{{ __('careers.phone') }}" class="input-ritz">
                    @error('phone')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <select wire:model="position" class="input-ritz">
                        <option value="">{{ __('careers.choose_position') }}</option>
                        @foreach ($positions as $pos)
                            <option value="{{ $pos }}">{{ $pos }}</option>
                        @endforeach
                    </select>
                    @error('position')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <input type="file" wire:model="cv" class="input-ritz">
                    @error('cv')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <textarea wire:model="message" placeholder="{{ __('careers.additional_info') }}" rows="4"
                        class="input-ritz w-full"></textarea>
                    @error('message')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <button type="submit"
                        class="px-10 py-4 bg-gradient-to-r from-ritz-gold to-ritz-red text-lg font-extrabold
                               rounded-lg shadow-[0_0_25px_#daa520] hover:scale-110 transform transition
                               uppercase tracking-wide">
                        {{ __('careers.submit') }}
                    </button>
                </form>
            </div>

            {{-- Contact Info --}}
            <div class="bg-gradient-to-b from-ritz-gold to-ritz-red p-8 rounded-xl shadow-2xl">
                <h3 class="text-3xl font-extrabold text-black mb-6 uppercase">
                    {{ __('contacts.title') }}
                </h3>
                <p class="text-lg mb-4"><i class="fa-solid fa-location-dot text-ritz-red"></i> ул. „Васил Левски“ №
                    11,<br>Пловдив</p>
                <p class="text-lg mb-4"><i class="fa-solid fa-phone text-ritz-red"></i> 0888 508 583</p>
                <p class="text-lg"><i class="fa-solid fa-envelope text-ritz-red"></i> reception_ritz@abv.bg</p>
            </div>
        </div>
    </section>
</div>
