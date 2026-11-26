<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_admin_can_open_dashboard_and_product_category_pages(): void
    {
        $category = Category::query()->create([
            'name' => 'Essentials',
            'slug' => 'essentials',
            'description' => 'Everyday pieces.',
        ]);
        $product = Product::query()->create([
            'category_id' => $category->id,
            'name' => 'Essential Tee',
            'slug' => 'essential-tee',
            'description' => 'A simple everyday tee.',
            'price' => 189000,
            'stock' => 4,
            'size' => 'S, M, L',
            'color' => 'Ivory',
        ]);

        $this->actingAs(User::factory()->create())
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('Low stock products')
            ->assertSee('Essential Tee');

        $this->get(route('admin.products.index'))->assertOk()->assertSee('Add new product');
        $this->get(route('admin.products.create'))->assertOk()->assertSee('Upload image');
        $this->get(route('admin.products.edit', $product))->assertOk()->assertSee('Save changes');

        $this->get(route('admin.categories.index'))->assertOk()->assertSee('Essentials');
        $this->get(route('admin.categories.create'))->assertOk()->assertSee('Create category');
        $this->get(route('admin.categories.edit', $category))->assertOk()->assertSee('Save changes');
    }
}
