<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Order;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            WebConfigSeeder::class,
            AdminSeeder::class,
            UserSeeder::class,
            BlogCategorySeeder::class,
            BlogSeeder::class,
            ServiceCategorySeeder::class,
            ServiceSeeder::class,
            TestimonySeeder::class,
        ]);
    }
}
