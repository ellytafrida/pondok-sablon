<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceCategory;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceCategory::factory()->create([
            'category' => 'Sablon Kertas'
        ]);

        ServiceCategory::factory()->create([
            'category' => 'Sablon Plastik'
        ]);

        ServiceCategory::factory()->create([
            'category' => 'Sablon Baju'
        ]);

        ServiceCategory::factory()->create([
            'category' => 'Tas Spondbond'
        ]);
    }
}
