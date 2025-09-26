<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">

    <title>{{ $title ?? 'Casino Ritz' }}</title>

    <meta name="description" content="{{ $description ?? '' }}">
    <meta name="keywords" content="{{ $keywords ?? '' }}">
    <meta name="author" content="{{ $author ?? '' }}">
    <meta name="robots" content="{{ $robots ?? 'index, follow' }}">
    <meta name="revisit-after" content="{{ $revisitAfter ?? '7 days' }}">
    <meta name="language" content="bg">
    <meta name="theme-color" content="#000000">

    {{-- Open Graph --}}
    <meta property="og:title" content="{{ $title ?? '' }}">
    <meta property="og:description" content="{{ $description ?? '' }}">
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $image ?? asset('images/ritz-default.jpg') }}">
    <meta property="og:locale" content="bg_BG">
    <meta property="og:site_name" content="Casino Ritz">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? '' }}">
    <meta name="twitter:description" content="{{ $description ?? '' }}">
    <meta name="twitter:image" content="{{ $image ?? asset('images/ritz-default.jpg') }}">
    <meta name="twitter:site" content="{{ $twitter ?? '@casinoritz' }}">

    {{-- Canonical --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Favicon & Icons --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    {{-- Preconnect --}}
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">

    {{-- JSON-LD --}}
    <script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'Casino Ritz',
    'url' => url('/'),
    'logo' => $image ?? asset('images/logo.png')
], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
</script>



    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @livewireStyles
</head>


@livewire('partials.cookie-consent')

<body class="bg-ritz-black text-ritz-text-main font-sans antialiased">
    @livewire('navigation')

    <main class="h-auto bg-ritz-black">
        {{ $slot }}
    </main>

    @livewire('partials.footer')
    @livewireScripts
</body>

</html>
