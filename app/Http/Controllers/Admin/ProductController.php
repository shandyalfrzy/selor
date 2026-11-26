<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RuntimeException;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('admin.products.index', [
            'products' => Product::query()
                ->with('category')
                ->latest()
                ->paginate(15),
        ]);
    }

    public function create(): View
    {
        return view('admin.products.create', [
            'categories' => Category::query()->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->rules());
        $image = $validated['image'] ?? null;
        unset($validated['image']);

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['slug'] = $this->uniqueSlug($validated['name']);

        if ($image instanceof UploadedFile) {
            $validated['image'] = $this->storeImage($image);
        }

        Product::query()->create($validated);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product): View
    {
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => Category::query()->orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate($this->rules());
        $image = $validated['image'] ?? null;
        unset($validated['image']);

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['slug'] = $this->uniqueSlug($validated['name'], $product);
        $previousImage = $product->image;
        $newImage = null;

        if ($image instanceof UploadedFile) {
            $newImage = $this->storeImage($image);
            $validated['image'] = $newImage;
        }

        $product->update($validated);

        if ($newImage !== null && $previousImage !== null) {
            $this->deleteImageIfUnused($previousImage);
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $image = $product->image;
        $product->delete();

        if ($image !== null) {
            $this->deleteImageIfUnused($image);
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }

    private function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:150'],
            'category_id' => ['required', 'exists:categories,id'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'size' => ['required', 'string', 'max:100'],
            'color' => ['required', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'is_featured' => ['sometimes', 'boolean'],
        ];
    }

    private function uniqueSlug(string $name, ?Product $product = null): string
    {
        $base = Str::substr(Str::slug($name) ?: 'product', 0, 160);
        $slug = $base;
        $suffix = 1;

        while (
            Product::query()
                ->where('slug', $slug)
                ->when($product, fn ($query) => $query->whereKeyNot($product->getKey()))
                ->exists()
        ) {
            $slug = $base.'-'.$suffix;
            $suffix++;
        }

        return $slug;
    }

    private function storeImage(UploadedFile $image): string
    {
        $path = $image->store('products', 'public');

        if (! is_string($path) || $path === '') {
            throw new RuntimeException('Gambar produk gagal disimpan ke public storage.');
        }

        return $path;
    }

    private function deleteImageIfUnused(string $path): void
    {
        if (Product::query()->where('image', $path)->exists()) {
            return;
        }

        $disk = Storage::disk('public');

        if ($disk->exists($path) && ! $disk->delete($path)) {
            throw new RuntimeException('Gambar produk tidak dapat dihapus dari public storage.');
        }
    }
}
