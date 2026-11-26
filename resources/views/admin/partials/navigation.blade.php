@php
    $navigationActiveClass = ($light ?? false)
        ? 'bg-beige text-charcoal'
        : 'bg-white/10 text-white';
    $navigationDefaultClass = ($light ?? false)
        ? 'text-charcoal hover:bg-ivory'
        : 'text-ivory/70 hover:bg-white/5 hover:text-white';
@endphp

<a class="{{ request()->routeIs('admin.dashboard') ? $navigationActiveClass : $navigationDefaultClass }} px-3 py-3 text-sm transition-colors" href="{{ route('admin.dashboard') }}">
    Dashboard
</a>
<a class="{{ request()->routeIs('admin.products.*') ? $navigationActiveClass : $navigationDefaultClass }} px-3 py-3 text-sm transition-colors" href="{{ route('admin.products.index') }}">
    Products
</a>
<a class="{{ request()->routeIs('admin.categories.*') ? $navigationActiveClass : $navigationDefaultClass }} px-3 py-3 text-sm transition-colors" href="{{ route('admin.categories.index') }}">
    Categories
</a>
