<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogCategory;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlogCategory::factory()->create([
            'category' => 'Seputar Kami'
        ]);

        BlogCategory::factory()->create([
            'category' => 'Percetakan'
        ]);

        BlogCategory::factory()->create([
            'category' => 'Bisnis'
        ]);
    }
}
