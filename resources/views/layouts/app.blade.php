<!DOCTYPE html>
<html lang="{{ app()->getLocale() ?: 'bg' }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">

    <meta name="google" content="notranslate">

    <title>{{ $title ?? 'Casino Ritz – Казино и Игри Онлайн' }}</title>

    <meta name="description"
        content="{{ $description ?? 'Casino Ritz — модерно казино с премиум игрален салон, турнири, VIP програми и уникално игрово изживяване.' }}">

    @if (!empty($author))
        <meta name="author" content="{{ $author }}">
    @endif

    <meta name="robots"
        content="{{ $robots ?? 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1' }}">
    <meta name="theme-color" content="#000000">
    <meta name="language" content="bg">
    <meta name="referrer" content="no-referrer-when-downgrade">

    <link rel="canonical" href="{{ request()->url() }}">

    <meta property="og:title" content="{{ $title ?? 'Casino Ritz' }}">
    <meta property="og:description" content="{{ $description ?? 'Премиум казино изживяване.' }}">
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:image" content="{{ $image ?? asset('images/ritz-default.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="bg_BG">
    <meta property="og:site_name" content="Casino Ritz">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'Casino Ritz' }}">
    <meta name="twitter:description" content="{{ $description ?? '' }}">
    <meta name="twitter:image" content="{{ $image ?? asset('images/ritz-default.jpg') }}">
    <meta name="twitter:site" content="@CasinoRitz">
    <meta name="twitter:creator" content="@CasinoRitz">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="mask-icon" href="{{ asset('safari-pinned-tab.svg') }}" color="#000000">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    <link rel="preload" as="image" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">


    @if (!empty($websiteSchema))
        <script type="application/ld+json">
{!! json_encode(array_merge(['@context' => 'https://schema.org'], $websiteSchema), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
</script>
    @endif

    @if (!empty($schema))
        <script type="application/ld+json">
{!! json_encode(array_merge(['@context' => 'https://schema.org'], $schema), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
</script>
    @endif

    @if (!empty($breadcrumb))
        <script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => collect($breadcrumb)->map(function($item, $i){
        return [
            '@type' => 'ListItem',
            'position' => $i + 1,
            'name' => $item['name'],
            'item' => $item['url'],
        ];
    })
], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
</script>
    @endif

    @if (!empty($organizationSchema))
        <script type="application/ld+json">
{!! json_encode(array_merge(['@context' => 'https://schema.org'], $organizationSchema), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
</script>
    @endif

    @if (!empty($gallerySchema))
        <script type="application/ld+json">
{!! json_encode(array_merge(['@context' => 'https://schema.org'], $gallerySchema), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
</script>
    @endif


    @if (!empty($jobPostingSchema))
        <script type="application/ld+json">
{!! json_encode(array_merge(['@context' => 'https://schema.org'], $jobPostingSchema), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
</script>
    @endif

    @if (!empty($localBusinessSchema))
        <script type="application/ld+json">
{!! json_encode(array_merge(['@context' => 'https://schema.org'], $localBusinessSchema), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
</script>
    @endif

    @if (!empty($collectionSchema))
        <script type="application/ld+json">
{!! json_encode(array_merge(['@context' => 'https://schema.org'], $collectionSchema), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
</script>
    @endif

    @if (!empty($itemListSchema))
        <script type="application/ld+json">
{!! json_encode(array_merge(['@context' => 'https://schema.org'], $itemListSchema), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
</script>
    @endif


    @if (!empty($gameSchema))
        <script type="application/ld+json">
{!! json_encode(array_merge(['@context' => 'https://schema.org'], $gameSchema), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
</script>
    @endif

    @if (!empty($breadcrumbSchema))
        <script type="application/ld+json">
{!! json_encode(array_merge(['@context' => 'https://schema.org'], $breadcrumbSchema), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
</script>
    @endif

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
