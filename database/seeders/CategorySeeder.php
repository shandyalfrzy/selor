<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Essentials',
                'slug' => 'essentials',
                'description' => 'Everyday pieces with a considered, minimal form.',
            ],
            [
                'name' => 'Tops',
                'slug' => 'tops',
                'description' => 'Versatile shirts and tops for everyday wear.',
            ],
            [
                'name' => 'Outerwear',
                'slug' => 'outerwear',
                'description' => 'Layering pieces with a clean, contemporary silhouette.',
            ],
            [
                'name' => 'Bottoms',
                'slug' => 'bottoms',
                'description' => 'Relaxed essentials designed for everyday movement.',
            ],
        ];

        foreach ($categories as $category) {
            Category::query()->updateOrCreate(
                ['slug' => $category['slug']],
                $category,
            );
        }
    }
}
