<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_a_product_and_upload_its_image(): void
    {
        Storage::fake('public');

        $category = Category::query()->create([
            'name' => 'Essentials',
            'slug' => 'essentials',
        ]);

        $this->actingAs(User::factory()->create())
            ->post(route('admin.products.store'), [
                'category_id' => $category->id,
                'name' => 'Essential Oversized Tee',
                'description' => 'A relaxed everyday tee.',
                'price' => 189000,
                'stock' => 12,
                'size' => 'S, M, L',
                'color' => 'Ivory',
                'is_featured' => '1',
                'image' => UploadedFile::fake()->image('tee.jpg'),
            ])
            ->assertRedirect(route('admin.products.index'))
            ->assertSessionHasNoErrors();

        $product = Product::query()->firstOrFail();

        $this->assertSame('essential-oversized-tee', $product->slug);
        $this->assertSame($category->id, $product->category_id);
        $this->assertTrue($product->is_featured);
        $this->assertStringStartsWith('products/', $product->image);
        Storage::disk('public')->assertExists($product->image);
    }

    public function test_product_requires_an_existing_category(): void
    {
        $this->actingAs(User::factory()->create())
            ->post(route('admin.products.store'), [
                'category_id' => 999,
                'name' => 'Essential Tee',
                'description' => 'A relaxed everyday tee.',
                'price' => 189000,
                'stock' => 12,
                'size' => 'S, M, L',
                'color' => 'Ivory',
            ])
            ->assertSessionHasErrors('category_id');

        $this->assertDatabaseCount('products', 0);
    }

    public function test_deleting_a_product_preserves_an_image_used_by_another_product(): void
    {
        Storage::fake('public');
        Storage::disk('public')->put('products/shared.jpg', 'image contents');

        $category = Category::query()->create([
            'name' => 'Essentials',
            'slug' => 'essentials',
        ]);

        $first = Product::query()->create($this->productAttributes($category, 'first'));
        Product::query()->create($this->productAttributes($category, 'second'));

        $this->actingAs(User::factory()->create())
            ->delete(route('admin.products.destroy', $first))
            ->assertRedirect(route('admin.products.index'));

        Storage::disk('public')->assertExists('products/shared.jpg');
        $this->assertDatabaseCount('products', 1);
    }

    private function productAttributes(Category $category, string $suffix): array
    {
        return [
            'category_id' => $category->id,
            'name' => 'Essential Tee '.$suffix,
            'slug' => 'essential-tee-'.$suffix,
            'description' => 'A simple tee.',
            'price' => 189000,
            'stock' => 10,
            'size' => 'S, M, L',
            'color' => 'Ivory',
            'image' => 'products/shared.jpg',
        ];
    }
}
