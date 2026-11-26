<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use RuntimeException;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'category' => 'essentials',
                'name' => 'Essential Oversized Tee',
                'slug' => 'essential-oversized-tee',
                'description' => 'A relaxed everyday tee with a clean, unisex silhouette.',
                'price' => 189000,
                'stock' => 24,
                'size' => 'S, M, L, XL',
                'color' => 'Ivory',
                'is_featured' => true,
            ],
            [
                'category' => 'tops',
                'name' => 'Relaxed Linen Shirt',
                'slug' => 'relaxed-linen-shirt',
                'description' => 'A considered button-up designed for easy layering.',
                'price' => 259000,
                'stock' => 18,
                'size' => 'S, M, L, XL',
                'color' => 'Soft Beige',
                'is_featured' => true,
            ],
            [
                'category' => 'outerwear',
                'name' => 'Minimalist Knit Cardigan',
                'slug' => 'minimalist-knit-cardigan',
                'description' => 'A simple knit layer with a versatile everyday fit.',
                'price' => 329000,
                'stock' => 12,
                'size' => 'S, M, L',
                'color' => 'Stone',
                'is_featured' => false,
            ],
            [
                'category' => 'bottoms',
                'name' => 'Wide Leg Trousers',
                'slug' => 'wide-leg-trousers',
                'description' => 'Relaxed trousers with a clean, wide-leg profile.',
                'price' => 289000,
                'stock' => 16,
                'size' => 'S, M, L, XL',
                'color' => 'Soft Beige',
                'is_featured' => true,
                'image_asset' => 'woman pants.jpg',
            ],
            [
                'category' => 'tops',
                'name' => 'Basic Cotton Shirt',
                'slug' => 'basic-cotton-shirt',
                'description' => 'An easy-to-style cotton shirt for a considered wardrobe.',
                'price' => 219000,
                'stock' => 4,
                'size' => 'S, M, L, XL',
                'color' => 'White',
                'is_featured' => false,
            ],
        ];

        foreach ($products as $product) {
            $imageAsset = $product['image_asset'] ?? null;
            unset($product['image_asset']);

            if ($imageAsset !== null) {
                $sourcePath = public_path('images/'.$imageAsset);

                if (is_file($sourcePath)) {
                    $imageContents = file_get_contents($sourcePath);

                    if ($imageContents === false || ! Storage::disk('public')->put('products/wide-leg-trousers.jpg', $imageContents)) {
                        throw new RuntimeException('Unable to seed the Wide Leg Trousers product image.');
                    }

                    $product['image'] = 'products/wide-leg-trousers.jpg';
                }
            }

            $category = Category::query()
                ->where('slug', $product['category'])
                ->firstOrFail();
            unset($product['category']);

            Product::query()->updateOrCreate(
                ['slug' => $product['slug']],
                [...$product, 'category_id' => $category->id],
            );
        }
    }
}
