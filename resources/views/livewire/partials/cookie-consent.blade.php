<div x-data="{ open: localStorage.getItem('cookie_consent') ? false : true }" x-show="open" x-cloak
    class="fixed bottom-0 inset-x-0 bg-ritz-black text-white shadow-lg z-50">
    <div class="container mx-auto px-6 py-4 flex flex-col md:flex-row items-center justify-between gap-4">
        <p class="text-sm leading-relaxed">
            {{ __('cookies.intro') }}
            <a href="{{ route('privacy', ['lang' => app()->getLocale()]) }}" class="underline hover:text-ritz-red">
                {{ __('cookies.privacy_link') }}
            </a>
            &nbsp;|&nbsp;
            <a href="{{ route('cookies', ['lang' => app()->getLocale()]) }}" class="underline hover:text-ritz-red">
                {{ __('cookies.title') }}
            </a>
        </p>

        <div class="flex gap-2">
            <button @click="localStorage.setItem('cookie_consent', true); open = false"
                class="bg-ritz-red text-white px-4 py-2 rounded-lg font-semibold hover:bg-red-700 transition">
                {{ __('cookies.accept') }}
            </button>
            <button @click="open = false"
                class="bg-gray-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-gray-800 transition">
                {{ __('cookies.decline') }}
            </button>
        </div>
    </div>
</div>
