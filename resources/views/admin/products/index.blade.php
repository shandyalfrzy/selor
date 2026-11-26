@extends('layouts.admin')

@section('title', 'Products — SÉLOR Admin')
@section('heading', 'Products')
@section('description', 'Manage the pieces currently listed in your catalogue.')
@section('header_action')
    <a class="inline-flex min-h-11 items-center justify-center bg-charcoal px-5 text-xs font-medium uppercase tracking-[0.13em] text-white transition-colors hover:bg-olive" href="{{ route('admin.products.create') }}">Add new product</a>
@endsection

@section('content')
    <section class="border border-border bg-white">
        <div class="flex items-center justify-between border-b border-border px-5 py-4 sm:px-6">
            <p class="text-sm">{{ $products->total() }} products</p>
            <a class="text-xs underline decoration-border underline-offset-4 hover:text-olive" href="{{ route('admin.categories.index') }}">Manage categories</a>
        </div>

        @if ($products->isNotEmpty())
            <div class="overflow-x-auto">
                <table class="w-full min-w-[54rem] text-left text-sm">
                    <thead class="bg-ivory/70 text-[0.625rem] uppercase tracking-[0.12em] text-muted">
                        <tr>
                            <th class="px-5 py-3 font-medium sm:px-6">Product</th>
                            <th class="px-5 py-3 font-medium">Category</th>
                            <th class="px-5 py-3 font-medium">Price</th>
                            <th class="px-5 py-3 font-medium">Stock</th>
                            <th class="px-5 py-3 font-medium">Status</th>
                            <th class="px-5 py-3 text-right font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        @foreach ($products as $product)
                            <tr>
                                <td class="px-5 py-4 sm:px-6">
                                    <div class="flex items-center gap-3">
                                        <img
                                            class="h-14 w-11 bg-beige object-cover"
                                            src="{{ $product->image ? url('storage/'.$product->image) : asset('images/product-placeholder.svg') }}"
                                            alt=""
                                            loading="lazy"
                                            onerror="this.onerror=null;this.src='{{ asset('images/product-placeholder.svg') }}'"
                                        >
                                        <span class="font-medium">{{ $product->name }}</span>
                                    </div>
                                </td>
                                <td class="px-5 py-4 text-muted">{{ $product->category->name }}</td>
                                <td class="whitespace-nowrap px-5 py-4">Rp {{ number_format((float) $product->price, 0, ',', '.') }}</td>
                                <td class="px-5 py-4">{{ $product->stock }}</td>
                                <td class="px-5 py-4">
                                    @if ($product->is_featured)
                                        <span class="text-xs text-olive">Selected</span>
                                    @else
                                        <span class="text-xs text-muted">Standard</span>
                                    @endif
                                </td>
                                <td class="px-5 py-4">
                                    <div class="flex justify-end gap-4">
                                        <a class="text-xs underline decoration-border underline-offset-4 hover:text-olive" href="{{ route('admin.products.edit', $product) }}">Edit</a>
                                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-xs text-danger underline decoration-danger/30 underline-offset-4 hover:decoration-danger" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if ($products->hasPages())
                <div class="border-t border-border px-5 py-4 sm:px-6">{{ $products->links() }}</div>
            @endif
        @else
            <div class="px-5 py-12 text-center sm:px-6">
                <h2 class="font-display text-3xl">No products yet</h2>
                <p class="mt-2 text-sm text-muted">Add the first piece to start building your catalogue.</p>
                <a class="mt-5 inline-flex min-h-11 items-center bg-charcoal px-5 text-xs font-medium uppercase tracking-[0.13em] text-white hover:bg-olive" href="{{ route('admin.products.create') }}">Add new product</a>
            </div>
        @endif
    </section>
@endsection
