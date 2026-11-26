<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#F5F3EE">
    <title>Sign in — SÉLOR Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-ivory text-charcoal">
    <main class="grid min-h-screen lg:grid-cols-[1.05fr_0.95fr]">
        <section class="relative hidden min-h-screen overflow-hidden bg-beige lg:block">
            <img class="absolute inset-0 h-full w-full object-cover" src="{{ asset('images/Model%20Selor.jpg') }}" alt="">
            <div class="absolute inset-x-0 bottom-0 bg-charcoal/85 p-12 text-white">
                <p class="text-[0.625rem] uppercase tracking-[0.2em] text-white/75">SÉLOR / Store administration</p>
                <p class="mt-3 max-w-md font-display text-5xl leading-none">A considered space for everyday essentials.</p>
            </div>
        </section>

        <section class="flex min-h-screen flex-col px-6 py-7 sm:px-10 lg:px-16">
            <a class="flex h-16 w-28 items-center" href="{{ route('home') }}" aria-label="SÉLOR">
                <img class="max-h-full w-full object-contain" src="{{ asset('images/S%C3%A9lor%20Logo.png') }}" alt="SÉLOR" width="1536" height="1024">
            </a>

            <div class="my-auto w-full max-w-md self-center py-16">
                <p class="mb-4 text-[0.625rem] font-semibold uppercase tracking-[0.2em] text-olive">Admin access</p>
                <h1 class="font-display text-5xl leading-none sm:text-6xl">Welcome back.</h1>
                <p class="mt-4 text-sm leading-6 text-muted">Sign in to manage products and collections.</p>

                @if ($errors->any())
                    <div class="mt-7 border border-danger/30 bg-danger/5 px-4 py-3 text-sm text-danger" role="alert">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form class="mt-8 space-y-5" action="{{ route('admin.login.store') }}" method="POST">
                    @csrf
                    <div>
                        <label class="block text-xs font-medium" for="email">Email address</label>
                        <input
                            class="mt-2 min-h-12 w-full border border-border bg-white px-4 text-sm outline-none transition focus:border-charcoal focus:ring-1 focus:ring-charcoal"
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            autocomplete="username"
                            required
                            autofocus
                            aria-describedby="@error('email') email-error @enderror"
                        >
                        @error('email')
                            <p class="mt-2 text-xs text-danger" id="email-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-medium" for="password">Password</label>
                        <input
                            class="mt-2 min-h-12 w-full border border-border bg-white px-4 text-sm outline-none transition focus:border-charcoal focus:ring-1 focus:ring-charcoal"
                            id="password"
                            name="password"
                            type="password"
                            autocomplete="current-password"
                            required
                            aria-describedby="@error('password') password-error @enderror"
                        >
                        @error('password')
                            <p class="mt-2 text-xs text-danger" id="password-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <button class="mt-2 min-h-12 w-full bg-charcoal px-5 text-xs font-medium uppercase tracking-[0.16em] text-white transition-colors hover:bg-olive focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-olive" type="submit">
                        Sign in
                    </button>
                </form>
            </div>

            <p class="text-xs text-muted">SÉLOR · Defined by Simplicity.</p>
        </section>
    </main>
</body>
</html>
