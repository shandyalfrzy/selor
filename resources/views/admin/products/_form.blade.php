@php
    $currentImage = $product?->image
        ? url('storage/'.$product->image)
        : asset('images/product-placeholder.svg');
@endphp

<form class="border border-border bg-white p-5 sm:p-8" action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($method !== 'POST')
        @method($method)
    @endif

    <div class="grid gap-x-8 gap-y-6 lg:grid-cols-[minmax(0,1fr)_18rem]">
        <div class="space-y-5">
            <div>
                <label class="block text-xs font-medium" for="name">Product name <span class="text-danger">*</span></label>
                <input class="mt-2 min-h-12 w-full border border-border bg-white px-4 text-sm outline-none transition focus:border-charcoal focus:ring-1 focus:ring-charcoal" id="name" name="name" type="text" value="{{ old('name', $product?->name) }}" maxlength="150" required>
                @error('name')<p class="mt-2 text-xs text-danger">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-xs font-medium" for="category_id">Category <span class="text-danger">*</span></label>
                <select class="mt-2 min-h-12 w-full border border-border bg-white px-4 text-sm outline-none transition focus:border-charcoal focus:ring-1 focus:ring-charcoal" id="category_id" name="category_id" required>
                    <option value="">Choose a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected((string) old('category_id', $product?->category_id) === (string) $category->id)>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')<p class="mt-2 text-xs text-danger">{{ $message }}</p>@enderror
                @if ($categories->isEmpty())
                    <p class="mt-2 text-xs text-muted">Create a category before adding a product.</p>
                @endif
            </div>

            <div>
                <label class="block text-xs font-medium" for="description">Description <span class="text-danger">*</span></label>
                <textarea class="mt-2 min-h-32 w-full resize-y border border-border bg-white px-4 py-3 text-sm leading-6 outline-none transition focus:border-charcoal focus:ring-1 focus:ring-charcoal" id="description" name="description" rows="5" required>{{ old('description', $product?->description) }}</textarea>
                @error('description')<p class="mt-2 text-xs text-danger">{{ $message }}</p>@enderror
            </div>

            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label class="block text-xs font-medium" for="price">Price (IDR) <span class="text-danger">*</span></label>
                    <input class="mt-2 min-h-12 w-full border border-border bg-white px-4 text-sm outline-none transition focus:border-charcoal focus:ring-1 focus:ring-charcoal" id="price" name="price" type="number" min="0" step="0.01" value="{{ old('price', $product?->price) }}" required>
                    @error('price')<p class="mt-2 text-xs text-danger">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-xs font-medium" for="stock">Stock <span class="text-danger">*</span></label>
                    <input class="mt-2 min-h-12 w-full border border-border bg-white px-4 text-sm outline-none transition focus:border-charcoal focus:ring-1 focus:ring-charcoal" id="stock" name="stock" type="number" min="0" step="1" value="{{ old('stock', $product?->stock) }}" required>
                    @error('stock')<p class="mt-2 text-xs text-danger">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label class="block text-xs font-medium" for="size">Sizes <span class="text-danger">*</span></label>
                    <input class="mt-2 min-h-12 w-full border border-border bg-white px-4 text-sm outline-none transition focus:border-charcoal focus:ring-1 focus:ring-charcoal" id="size" name="size" type="text" value="{{ old('size', $product?->size) }}" maxlength="100" placeholder="S, M, L, XL" required>
                    @error('size')<p class="mt-2 text-xs text-danger">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-xs font-medium" for="color">Color <span class="text-danger">*</span></label>
                    <input class="mt-2 min-h-12 w-full border border-border bg-white px-4 text-sm outline-none transition focus:border-charcoal focus:ring-1 focus:ring-charcoal" id="color" name="color" type="text" value="{{ old('color', $product?->color) }}" maxlength="100" required>
                    @error('color')<p class="mt-2 text-xs text-danger">{{ $message }}</p>@enderror
                </div>
            </div>

            <label class="flex min-h-12 items-center gap-3 border-t border-border pt-4 text-sm">
                <input class="h-4 w-4 accent-olive" name="is_featured" type="checkbox" value="1" @checked(old('is_featured', $product?->is_featured ?? false))>
                <span>Mark as a selected piece</span>
            </label>
        </div>

        <aside>
            <p class="mb-2 text-xs font-medium">Product image</p>
            <div class="aspect-[3/4] overflow-hidden bg-beige">
                <img class="h-full w-full object-cover" src="{{ $currentImage }}" alt="Preview gambar produk" data-admin-image-preview>
            </div>
            <label class="mt-4 block text-xs font-medium" for="image">Upload image</label>
            <input class="mt-2 block w-full text-xs text-muted file:mr-3 file:min-h-10 file:border-0 file:bg-charcoal file:px-4 file:text-xs file:font-medium file:text-white hover:file:bg-olive" id="image" name="image" type="file" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp" data-admin-image-input>
            <p class="mt-2 text-xs leading-5 text-muted">JPG, JPEG, PNG, or WEBP. Maximum 2 MB. Optional.</p>
            @error('image')<p class="mt-2 text-xs text-danger">{{ $message }}</p>@enderror
        </aside>
    </div>

    <div class="mt-8 flex flex-col-reverse gap-3 border-t border-border pt-6 sm:flex-row sm:justify-end">
        <a class="inline-flex min-h-11 items-center justify-center border border-border px-5 text-xs font-medium transition-colors hover:bg-ivory" href="{{ route('admin.products.index') }}">Cancel</a>
        <button class="inline-flex min-h-11 items-center justify-center bg-charcoal px-5 text-xs font-medium uppercase tracking-[0.13em] text-white transition-colors hover:bg-olive" type="submit" @disabled($categories->isEmpty())>{{ $submitLabel }}</button>
    </div>
</form>
