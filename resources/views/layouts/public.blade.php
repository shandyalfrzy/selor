<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#F5F3EE">
    <meta name="description" content="SÉLOR — contemporary unisex fashion, defined by simplicity.">
    <title>@yield('title', 'SÉLOR — Defined by Simplicity.')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <a class="skip-link" href="#main-content">Lewati ke konten utama</a>

    <header class="sticky top-0 z-40 border-b border-border bg-ivory">
        <div class="site-container flex h-[4.75rem] items-center justify-between gap-6">
            <a class="flex h-[4.5rem] w-28 items-center" href="{{ route('home') }}" aria-label="SÉLOR, home">
                <img class="max-h-full w-full object-contain" src="{{ asset('images/S%C3%A9lor%20Logo.png') }}" alt="SÉLOR" width="1536" height="1024">
            </a>

            <nav class="hidden items-center gap-8 text-[0.75rem] font-medium tracking-[0.04em] lg:flex" aria-label="Navigasi utama">
                <a class="transition-colors hover:text-olive" href="#home">Home</a>
                <a class="transition-colors hover:text-olive" href="#collections">Collections</a>
                <a class="transition-colors hover:text-olive" href="#about">About</a>
                <a class="transition-colors hover:text-olive" href="#contact">Contact</a>
            </nav>

            <div class="flex items-center gap-3">
                <a class="hidden min-h-11 items-center bg-charcoal px-5 text-[0.6875rem] font-medium uppercase tracking-[0.14em] text-white transition-colors hover:bg-olive sm:inline-flex" href="#products">
                    Shop now
                </a>
                <button class="inline-flex h-11 w-11 items-center justify-center border border-border lg:hidden" type="button" aria-label="Buka navigasi" aria-expanded="false" aria-controls="mobile-navigation" data-menu-toggle>
                    <svg aria-hidden="true" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M3 6H17M3 10H17M3 14H17" stroke="currentColor" stroke-width="1.25" stroke-linecap="square"/>
                    </svg>
                </button>
            </div>
        </div>

        <nav class="mobile-navigation border-t border-border bg-ivory px-5 py-4 lg:hidden" id="mobile-navigation" aria-label="Navigasi mobile" data-mobile-navigation hidden>
            <div class="site-container flex flex-col gap-1">
                <a class="py-3 text-sm" href="#home">Home</a>
                <a class="py-3 text-sm" href="#collections">Collections</a>
                <a class="py-3 text-sm" href="#about">About</a>
                <a class="py-3 text-sm" href="#contact">Contact</a>
                <a class="mt-2 border-t border-border py-3 text-sm font-medium" href="#products">Shop now</a>
            </div>
        </nav>
    </header>

    @yield('content')

    <footer class="border-t border-border bg-ivory">
        <div class="site-container flex flex-col gap-5 py-8 sm:flex-row sm:items-end sm:justify-between">
            <a class="flex h-14 w-24 items-center" href="{{ route('home') }}" aria-label="SÉLOR">
                <img class="max-h-full w-full object-contain" src="{{ asset('images/S%C3%A9lor%20Logo.png') }}" alt="SÉLOR" width="1536" height="1024" loading="lazy">
            </a>
            <p class="text-xs text-muted">© {{ now()->year }} SÉLOR. Defined by Simplicity.</p>
        </div>
    </footer>
</body>
</html>
