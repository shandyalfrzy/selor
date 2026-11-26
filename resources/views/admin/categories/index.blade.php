@extends('layouts.admin')

@section('title', 'Categories — SÉLOR Admin')
@section('heading', 'Categories')
@section('description', 'Organise the collections displayed in the storefront.')
@section('header_action')
    <a class="inline-flex min-h-11 items-center justify-center bg-charcoal px-5 text-xs font-medium uppercase tracking-[0.13em] text-white transition-colors hover:bg-olive" href="{{ route('admin.categories.create') }}">Add category</a>
@endsection

@section('content')
    <section class="border border-border bg-white">
        <div class="border-b border-border px-5 py-4 sm:px-6">
            <p class="text-sm">{{ $categories->total() }} categories</p>
        </div>

        @if ($categories->isNotEmpty())
            <div class="overflow-x-auto">
                <table class="w-full min-w-[46rem] text-left text-sm">
                    <thead class="bg-ivory/70 text-[0.625rem] uppercase tracking-[0.12em] text-muted">
                        <tr>
                            <th class="px-5 py-3 font-medium sm:px-6">Name</th>
                            <th class="px-5 py-3 font-medium">Slug</th>
                            <th class="px-5 py-3 font-medium">Products</th>
                            <th class="px-5 py-3 font-medium">Description</th>
                            <th class="px-5 py-3 text-right font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        @foreach ($categories as $category)
                            <tr>
                                <td class="px-5 py-4 font-medium sm:px-6">{{ $category->name }}</td>
                                <td class="px-5 py-4 text-muted">{{ $category->slug }}</td>
                                <td class="px-5 py-4">{{ $category->products_count }}</td>
                                <td class="max-w-xs truncate px-5 py-4 text-muted">{{ $category->description ?: '—' }}</td>
                                <td class="px-5 py-4">
                                    <div class="flex justify-end gap-4">
                                        <a class="text-xs underline decoration-border underline-offset-4 hover:text-olive" href="{{ route('admin.categories.edit', $category) }}">Edit</a>
                                        @if ($category->products_count === 0)
                                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-xs text-danger underline decoration-danger/30 underline-offset-4 hover:decoration-danger" type="submit">Delete</button>
                                            </form>
                                        @else
                                            <span class="text-xs text-muted" title="Pindahkan atau hapus produk terkait terlebih dahulu">In use</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if ($categories->hasPages())
                <div class="border-t border-border px-5 py-4 sm:px-6">{{ $categories->links() }}</div>
            @endif
        @else
            <div class="px-5 py-12 text-center sm:px-6">
                <h2 class="font-display text-3xl">No categories yet</h2>
                <p class="mt-2 text-sm text-muted">Create a category to organise your products.</p>
                <a class="mt-5 inline-flex min-h-11 items-center bg-charcoal px-5 text-xs font-medium uppercase tracking-[0.13em] text-white hover:bg-olive" href="{{ route('admin.categories.create') }}">Add category</a>
            </div>
        @endif
    </section>
@endsection
