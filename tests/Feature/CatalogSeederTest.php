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
        $this->assertSame(5, Product::query()->count());
        $this->assertTrue(Product::query()->firstOrFail()->category()->exists());
        $this->assertSame(
            'products/wide-leg-trousers.jpg',
            Product::query()->where('slug', 'wide-leg-trousers')->value('image'),
        );
        Storage::disk('public')->assertExists('products/wide-leg-trousers.jpg');
    }
}
