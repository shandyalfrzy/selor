<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_a_category(): void
    {
        $this->actingAs(User::factory()->create())
            ->post(route('admin.categories.store'), [
                'name' => 'Essentials',
                'slug' => 'essentials',
                'description' => 'Everyday pieces.',
            ])
            ->assertRedirect(route('admin.categories.index'))
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('categories', [
            'name' => 'Essentials',
            'slug' => 'essentials',
        ]);
    }

    public function test_category_slug_must_be_unique(): void
    {
        $category = Category::query()->create([
            'name' => 'Essentials',
            'slug' => 'essentials',
        ]);

        $this->actingAs(User::factory()->create())
            ->post(route('admin.categories.store'), [
                'name' => 'Another Essentials',
                'slug' => $category->slug,
                'description' => null,
            ])
            ->assertSessionHasErrors('slug');
    }

    public function test_category_with_products_cannot_be_deleted(): void
    {
        $category = Category::query()->create([
            'name' => 'Essentials',
            'slug' => 'essentials',
        ]);

        Product::query()->create([
            'category_id' => $category->id,
            'name' => 'Essential Tee',
            'slug' => 'essential-tee',
            'description' => 'A simple tee.',
            'price' => 189000,
            'stock' => 10,
            'size' => 'S, M, L',
            'color' => 'Ivory',
        ]);

        $this->actingAs(User::factory()->create())
            ->delete(route('admin.categories.destroy', $category))
            ->assertSessionHasErrors('category');

        $this->assertDatabaseHas('categories', ['id' => $category->id]);
    }
}
