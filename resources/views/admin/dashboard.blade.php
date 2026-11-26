@extends('layouts.admin')

@section('title', 'Dashboard — SÉLOR Admin')
@section('heading', 'Dashboard')
@section('description', 'A clear overview of your current product catalogue.')

@section('content')
    <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4" aria-label="Store summary">
        <article class="border border-border bg-white p-5 sm:p-6">
            <p class="text-xs text-muted">Total products</p>
            <p class="mt-5 font-display text-5xl leading-none">{{ $productCount }}</p>
        </article>
        <article class="border border-border bg-white p-5 sm:p-6">
            <p class="text-xs text-muted">Total categories</p>
            <p class="mt-5 font-display text-5xl leading-none">{{ $categoryCount }}</p>
        </article>
        <article class="border border-border bg-white p-5 sm:p-6">
            <p class="text-xs text-muted">Selected pieces</p>
            <p class="mt-5 font-display text-5xl leading-none">{{ $featuredProductCount }}</p>
        </article>
        <article class="border border-border bg-white p-5 sm:p-6">
            <p class="text-xs text-muted">Low stock · 5 or fewer</p>
            <p class="mt-5 font-display text-5xl leading-none">{{ $lowStockProducts->count() }}</p>
        </article>
    </section>

    <section class="mt-10 border border-border bg-white sm:mt-12">
        <div class="flex flex-col justify-between gap-4 border-b border-border px-5 py-5 sm:flex-row sm:items-center sm:px-6">
            <div>
                <p class="text-[0.625rem] font-semibold uppercase tracking-[0.16em] text-olive">Inventory</p>
                <h2 class="mt-2 font-display text-3xl">Low stock products</h2>
            </div>
            <a class="text-xs underline decoration-border underline-offset-4 hover:text-olive" href="{{ route('admin.products.index') }}">View all products</a>
        </div>

        @if ($lowStockProducts->isNotEmpty())
            <div class="overflow-x-auto">
                <table class="w-full min-w-[36rem] text-left text-sm">
                    <thead class="bg-ivory/70 text-[0.625rem] uppercase tracking-[0.12em] text-muted">
                        <tr>
                            <th class="px-5 py-3 font-medium sm:px-6">Product</th>
                            <th class="px-5 py-3 font-medium">Category</th>
                            <th class="px-5 py-3 font-medium">Stock</th>
                            <th class="px-5 py-3 font-medium">Price</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        @foreach ($lowStockProducts as $product)
                            <tr>
                                <td class="px-5 py-4 font-medium sm:px-6">{{ $product->name }}</td>
                                <td class="px-5 py-4 text-muted">{{ $product->category->name }}</td>
                                <td class="px-5 py-4 {{ $product->stock === 0 ? 'text-danger' : 'text-olive' }}">{{ $product->stock }}</td>
                                <td class="px-5 py-4">Rp {{ number_format((float) $product->price, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="px-5 py-8 text-sm text-muted sm:px-6">No low-stock products at the moment.</p>
        @endif
    </section>
@endsection
