<?php

namespace Database\Seeders;

use App\Models\WebConfig;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WebConfig::factory()->create([
            'name' => 'Pondok Sablon',
            'about' => 'Kami buka setiap hari pada pukul 08.00 - 17.00 kecuali hari Jumat dan Minggu Tutup.',
            'favicon' => 'img/favicon.png',
            'logo' => 'img/favicon.png',
            'address' => 'Komplek Gerbang Permata Blok K, Jalan Karya Tani No.19, Kabupaten Ketapang',
            'email' => 'pondoksablon@gmail.com',
            'phone_number' => '0853-9202-9534',
            'facebook' => 'https://www.facebook.com/pondoksablon/',
            'instagram' => 'https://www.instagram.com/pondoksablon/',
            'latitude' => -1.8276238,
            'longitude' => 109.9870723,
        ]);
    }
}
