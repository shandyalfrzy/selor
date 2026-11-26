<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CatalogSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_catalog_seeders_create_the_required_categories_and_products(): void
    {
        Storage::fake('public');

        $this->seed([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);

        $this->assertSame(4, Category::query()->count());
        $this->assertSame(7, Product::query()->count());
        $this->assertTrue(Product::query()->firstOrFail()->category()->exists());

        foreach ([
            'wide-leg-trousers' => 'products/wide-leg-trousers.jpg',
            'relaxed-tailored-blazer' => 'products/relaxed-tailored-blazer.jpg',
            'soft-structure-blazer' => 'products/soft-structure-blazer.jpg',
        ] as $slug => $imagePath) {
            $this->assertSame($imagePath, Product::query()->where('slug', $slug)->value('image'));
            Storage::disk('public')->assertExists($imagePath);
        }
    }
}
