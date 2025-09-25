<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Casino Ritz' }}</title>

    {{-- Vite CSS/JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    {{-- Livewire Styles --}}
    @livewireStyles
</head>

<body class="bg-ritz-black text-ritz-text-main font-sans antialiased">

    @livewire('navigation')

    <main class="min-h-screen">
        {{ $slot }}
    </main>

    @livewire('partials.footer')

    {{-- Livewire Scripts --}}
    @livewireScripts
</body>

</html>
