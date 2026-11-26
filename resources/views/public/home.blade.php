@extends('layouts.public')

@section('title', 'SÉLOR — Contemporary Unisex Fashion')

@section('content')
<main id="main-content">
    <section class="section-space pb-12 sm:pb-16" id="home">
        <div class="site-container grid items-center gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:gap-16">
            <div class="max-w-2xl py-4 lg:py-10">
                <p class="eyebrow mb-7 text-olive">Contemporary unisex fashion</p>
                <h1 class="display-heading hero-title max-w-[10ch]">
                    Defined by <span class="italic text-olive">Simplicity.</span>
                </h1>
                <p class="mt-8 max-w-md text-[0.9375rem] leading-7 text-muted sm:text-base">
                    Thoughtful essentials for everyday expression.
                </p>
                <a class="mt-8 inline-flex min-h-12 items-center gap-5 bg-charcoal px-6 text-[0.6875rem] font-medium uppercase tracking-[0.15em] text-white transition-colors hover:bg-olive focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-olive" href="#collections">
                    Explore collection
                    <svg aria-hidden="true" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M2.5 8H13.5M13.5 8L8.5 3M13.5 8L8.5 13" stroke="currentColor" stroke-width="1.2"/>
                    </svg>
                </a>
                <p class="mt-12 border-t border-border pt-5 text-xs tracking-[0.03em] text-muted">
                    Considered forms. Everyday ease.
                </p>
            </div>

            <figure class="hero-visual relative overflow-hidden bg-beige">
                <img
                    src="{{ asset('images/Model%20Selor.jpg') }}"
                    alt="Model mengenakan setelan bernuansa beige dalam pemotretan editorial"
                    fetchpriority="high"
                    width="736"
                    height="1104"
                >
                <figcaption class="absolute bottom-4 left-4 bg-ivory/90 px-3 py-2 text-[0.625rem] uppercase tracking-[0.16em] text-charcoal sm:bottom-6 sm:left-6">
                    Form follows feeling
                </figcaption>
            </figure>
        </div>
    </section>

    <section class="section-space bg-beige/60" id="collections">
        <div class="site-container">
            <div class="mb-10 flex flex-col justify-between gap-5 sm:mb-14 sm:flex-row sm:items-end">
                <div>
                    <p class="eyebrow mb-4 text-olive">Find your everyday</p>
                    <h2 class="display-heading text-5xl leading-[0.95] sm:text-6xl">The collections</h2>
                </div>
                <p class="max-w-sm text-sm leading-6 text-muted">
                    A considered edit of pieces made to feel at home in your wardrobe.
                </p>
            </div>

            @if ($categories->isNotEmpty())
                <div class="grid grid-cols-1 border-t border-border sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($categories as $category)
                        <a
                            class="category-link group flex min-h-48 flex-col justify-between border-b border-border p-5 sm:min-h-56 sm:border-r sm:p-6 lg:border-r-0 lg:even:border-l"
                            href="#products"
                            data-filter-value="{{ $category->id }}"
                        >
                            <span class="flex items-center justify-between text-[0.6875rem] tracking-[0.12em] text-muted">
                                <span>{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                <span>{{ $category->products_count }} {{ \Illuminate\Support\Str::plural('piece', $category->products_count) }}</span>
                            </span>
                            <span class="flex items-end justify-between gap-4">
                                <span class="display-heading text-3xl leading-none sm:text-4xl">{{ $category->name }}</span>
                                <svg class="mb-1 shrink-0 transition-transform group-hover:translate-x-1" aria-hidden="true" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                    <path d="M2 9H16M16 9L10 3M16 9L10 15" stroke="currentColor" stroke-width="1.1"/>
                                </svg>
                            </span>
                        </a>
                    @endforeach
                </div>
            @else
                <p class="border-y border-border py-8 text-sm text-muted">Collections will appear here when available.</p>
            @endif
        </div>
    </section>

    <section class="section-space" id="products">
        <div class="site-container">
            <div class="mb-8 flex flex-col justify-between gap-6 sm:mb-10 md:flex-row md:items-end">
                <div>
                    <p class="eyebrow mb-4 text-olive">A curated edit</p>
                    <h2 class="display-heading text-5xl leading-[0.95] sm:text-6xl">The collection</h2>
                </div>
                <p class="text-sm text-muted">{{ $products->count() }} pieces</p>
            </div>

            @if ($products->isNotEmpty())
                <div class="mb-8 flex flex-wrap items-center gap-2 border-b border-border pb-5" aria-label="Filter products by category">
                    <button class="filter-button min-h-10 border border-transparent px-4 text-xs text-muted transition-colors hover:text-charcoal" type="button" data-filter-value="all" aria-pressed="true">
                        All pieces
                    </button>
                    @foreach ($categories as $category)
                        <button class="filter-button min-h-10 border border-transparent px-4 text-xs text-muted transition-colors hover:text-charcoal" type="button" data-filter-value="{{ $category->id }}" aria-pressed="false">
                            {{ $category->name }}
                        </button>
                    @endforeach
                </div>

                <div class="grid grid-cols-2 gap-x-4 gap-y-9 sm:gap-x-6 sm:gap-y-12 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($products as $product)
                        <article class="product-card min-w-0" data-product-card data-category-id="{{ $product->category_id }}">
                            <div class="product-image relative bg-beige">
                                <img
                                    class="block"
                                    src="{{ $product->image ? url('storage/'.$product->image) : asset('images/product-placeholder.svg') }}"
                                    data-product-image
                                    data-fallback="{{ asset('images/product-placeholder.svg') }}"
                                    alt="{{ $product->image ? $product->name.' in '.$product->color : 'Ilustrasi placeholder untuk '.$product->name }}"
                                    loading="lazy"
                                    width="640"
                                    height="853"
                                >
                                @if ($product->is_featured)
                                    <span class="absolute left-3 top-3 bg-ivory px-2.5 py-1.5 text-[0.5625rem] uppercase tracking-[0.15em] text-charcoal sm:left-4 sm:top-4">
                                        Selected
                                    </span>
                                @endif
                            </div>
                            <div class="flex items-start justify-between gap-3 pt-4">
                                <div class="min-w-0">
                                    <p class="mb-1.5 text-[0.625rem] uppercase tracking-[0.12em] text-muted">{{ $product->category->name }}</p>
                                    <h3 class="truncate text-[0.8125rem] font-medium sm:text-sm">{{ $product->name }}</h3>
                                    <p class="mt-2 text-[0.6875rem] {{ $product->stock > 0 ? 'text-muted' : 'text-danger' }}">
                                        {{ $product->stock > 0 ? 'Available' : 'Currently unavailable' }}
                                    </p>
                                </div>
                                <p class="shrink-0 pt-5 text-[0.75rem] sm:text-sm">Rp {{ number_format((float) $product->price, 0, ',', '.') }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
                <p class="py-12 text-center text-sm text-muted" data-filter-empty hidden>No pieces available in this collection.</p>
            @else
                <p class="border-y border-border py-12 text-center text-sm text-muted">No pieces available at the moment.</p>
            @endif
        </div>
    </section>

    <section class="section-space bg-charcoal text-ivory" id="about">
        <div class="site-container grid gap-8 md:grid-cols-[0.85fr_1.15fr] md:gap-16">
            <div>
                <p class="eyebrow mb-5 text-beige">The SÉLOR point of view</p>
                <h2 class="display-heading max-w-lg text-5xl leading-[0.95] sm:text-6xl">
                    Less, with intention.
                </h2>
            </div>
            <div class="max-w-xl self-end">
                <p class="text-base leading-7 text-ivory/80">
                    SÉLOR is a contemporary unisex fashion store shaped by a quieter approach to getting dressed. Clean lines, considered details, and versatile forms make space for everyday expression.
                </p>
                <p class="mt-5 text-sm leading-6 text-ivory/60">
                    Inspired by Korean minimalism and modern editorial style, each collection keeps simplicity at its center.
                </p>
            </div>
        </div>
    </section>

    <section class="section-space" id="contact">
        <div class="site-container flex flex-col justify-between gap-8 md:flex-row md:items-end">
            <div class="max-w-2xl">
                <p class="eyebrow mb-4 text-olive">A closer look</p>
                <h2 class="display-heading text-5xl leading-[0.95] sm:text-6xl">Find your piece.</h2>
                <p class="mt-5 max-w-lg text-sm leading-6 text-muted">
                    Browse the current collection and discover the essentials selected by SÉLOR.
                </p>
            </div>
            <a class="inline-flex min-h-12 items-center justify-center gap-5 border border-charcoal px-6 text-[0.6875rem] font-medium uppercase tracking-[0.15em] transition-colors hover:bg-beige focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-olive" href="#products">
                Explore the collection
                <svg aria-hidden="true" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M2.5 8H13.5M13.5 8L8.5 3M13.5 8L8.5 13" stroke="currentColor" stroke-width="1.2"/>
                </svg>
            </a>
        </div>
        <div class="site-container mt-12 border-t border-border pt-5">
            <p class="text-xs leading-5 text-muted">Official contact details are not available yet.</p>
        </div>
    </section>
</main>
@endsection
