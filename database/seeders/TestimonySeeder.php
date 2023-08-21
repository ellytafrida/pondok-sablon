<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimony;

class TestimonySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimony::factory()->create([
            'name' => 'Rico Pahlefi',
            'from' => 'Kayong Developer Community',
            'body' => 'Mantap Banget nih, Pelayanannya bagus banget broo'
        ]);

        Testimony::factory()->create([
            'name' => 'Bambang',
            'from' => 'Depot Cafe',
            'body' => 'Bahan plastiknya bagus gak mudah rusak.'
        ]);
    }
}
