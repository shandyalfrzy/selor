<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicStorefrontTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_renders_categories_and_products_from_the_database(): void
    {
        $category = Category::query()->create([
            'name' => 'Essentials',
            'slug' => 'essentials',
        ]);

        Product::query()->create([
            'category_id' => $category->id,
            'name' => 'Essential Tee',
            'slug' => 'essential-tee',
            'description' => 'A simple everyday tee.',
            'price' => 189000,
            'stock' => 8,
            'size' => 'S, M, L',
            'color' => 'Ivory',
        ]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Essentials')
            ->assertSee('Essential Tee')
            ->assertSee('Rp 189.000')
            ->assertSee('Defined by')
            ->assertSee('images/Model%20Selor.jpg')
            ->assertSee('images/S%C3%A9lor%20Logo.png');
    }

    public function test_homepage_shows_empty_states_when_the_catalog_is_empty(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Collections will appear here when available.')
            ->assertSee('No pieces available at the moment.');
    }
}
