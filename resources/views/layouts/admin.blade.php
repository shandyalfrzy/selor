<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#F5F3EE">
    <title>@yield('title', 'Admin — SÉLOR')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-ivory text-charcoal">
    <div class="min-h-screen lg:grid lg:grid-cols-[16rem_minmax(0,1fr)]">
        <aside class="hidden min-h-screen flex-col bg-charcoal px-6 py-7 text-ivory lg:sticky lg:top-0 lg:flex lg:h-screen">
            <a class="font-display text-3xl tracking-[0.12em]" href="{{ route('admin.dashboard') }}">SÉLOR</a>
            <p class="mt-1 text-[0.625rem] uppercase tracking-[0.2em] text-ivory/50">Store administration</p>

            <nav class="mt-12 flex flex-1 flex-col gap-1" aria-label="Navigasi administrasi">
                @include('admin.partials.navigation', ['light' => false])
            </nav>

            <div class="mt-8 border-t border-white/15 pt-5">
                <a class="block py-3 text-xs text-ivory/65 transition-colors hover:text-white" href="{{ route('home') }}">View storefront</a>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button class="w-full py-3 text-left text-xs text-ivory/65 transition-colors hover:text-white" type="submit">Sign out</button>
                </form>
            </div>
        </aside>

        <div class="min-w-0">
            <header class="flex min-h-[4.5rem] items-center justify-between border-b border-border bg-white px-5 sm:px-8 lg:px-10">
                <div class="flex items-center gap-3">
                    <button class="inline-flex h-10 w-10 items-center justify-center border border-border lg:hidden" type="button" aria-label="Buka navigasi admin" aria-expanded="false" aria-controls="admin-mobile-navigation" data-admin-menu-toggle>
                        <svg aria-hidden="true" width="19" height="19" viewBox="0 0 20 20" fill="none">
                            <path d="M3 6H17M3 10H17M3 14H17" stroke="currentColor" stroke-width="1.25"/>
                        </svg>
                    </button>
                    <span class="flex h-12 w-20 items-center lg:hidden">
                        <img class="max-h-full w-full object-contain" src="{{ asset('images/S%C3%A9lor%20Logo.png') }}" alt="SÉLOR" width="1536" height="1024">
                    </span>
                    <span class="hidden text-xs text-muted lg:block">Store administration</span>
                </div>
                <a class="text-xs underline decoration-border underline-offset-4 transition-colors hover:text-olive" href="{{ route('home') }}">View storefront</a>
            </header>

            <nav class="hidden border-b border-border bg-white px-5 py-3 sm:px-8 lg:hidden" id="admin-mobile-navigation" aria-label="Navigasi admin mobile" data-admin-mobile-navigation>
                <div class="flex flex-col gap-1">
                    @include('admin.partials.navigation', ['light' => true])
                    <form class="mt-2 border-t border-border pt-2" action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button class="w-full px-3 py-3 text-left text-sm text-muted" type="submit">Sign out</button>
                    </form>
                </div>
            </nav>

            <main class="px-5 py-8 sm:px-8 sm:py-10 lg:px-10 lg:py-12">
                <div class="mx-auto max-w-[90rem]">
                    @if (session('success'))
                        <div class="mb-6 border border-success/30 bg-success/5 px-4 py-3 text-sm text-success" role="status">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-6 border border-danger/30 bg-danger/5 px-4 py-3 text-sm text-danger" role="alert">
                            <p class="font-medium">Periksa kembali data yang dimasukkan.</p>
                            <ul class="mt-2 list-inside list-disc space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-8 flex flex-col justify-between gap-5 border-b border-border pb-6 sm:mb-10 sm:flex-row sm:items-end">
                        <div>
                            <p class="mb-3 text-[0.625rem] font-semibold uppercase tracking-[0.18em] text-olive">SÉLOR / ADMIN</p>
                            <h1 class="font-display text-4xl leading-none sm:text-5xl">@yield('heading')</h1>
                            @hasSection('description')
                                <p class="mt-3 max-w-2xl text-sm leading-6 text-muted">@yield('description')</p>
                            @endif
                        </div>
                        @yield('header_action')
                    </div>

                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>
</html>
