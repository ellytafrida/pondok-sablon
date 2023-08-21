<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::factory()->create([
            'name' => 'Paper Cup 12oz',
            'minimum_order' => 100,
            'unit_price' => 350,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Donec pretium vulputate sapien nec. Arcu felis bibendum ut tristique. Sed felis eget velit aliquet sagittis id. Dui id ornare arcu odio ut sem. Dui id ornare arcu odio ut sem nulla pharetra. Aliquam id diam maecenas ultricies mi. Convallis tellus id interdum velit laoreet id donec ultrices tincidunt. Fermentum et sollicitudin ac orci. In massa tempor nec feugiat nisl pretium fusce id. Varius quam quisque id diam vel quam. Sed viverra ipsum nunc aliquet.',
            'category_id' => 1,
        ]);

        Service::factory()->create([
            'name' => 'Paper Cup 16oz',
            'minimum_order' => 100,
            'unit_price' => 200,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Donec pretium vulputate sapien nec. Arcu felis bibendum ut tristique. Sed felis eget velit aliquet sagittis id. Dui id ornare arcu odio ut sem. Dui id ornare arcu odio ut sem nulla pharetra. Aliquam id diam maecenas ultricies mi. Convallis tellus id interdum velit laoreet id donec ultrices tincidunt. Fermentum et sollicitudin ac orci. In massa tempor nec feugiat nisl pretium fusce id. Varius quam quisque id diam vel quam. Sed viverra ipsum nunc aliquet.',
            'category_id' => 1,
        ]);

        Service::factory()->create([
            'name' => 'Plastic Cup 12oz',
            'minimum_order' => 100,
            'unit_price' => 250,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Donec pretium vulputate sapien nec. Arcu felis bibendum ut tristique. Sed felis eget velit aliquet sagittis id. Dui id ornare arcu odio ut sem. Dui id ornare arcu odio ut sem nulla pharetra. Aliquam id diam maecenas ultricies mi. Convallis tellus id interdum velit laoreet id donec ultrices tincidunt. Fermentum et sollicitudin ac orci. In massa tempor nec feugiat nisl pretium fusce id. Varius quam quisque id diam vel quam. Sed viverra ipsum nunc aliquet.',
            'category_id' => 2,
        ]);

        Service::factory()->create([
            'name' => 'Plastic Cup 16oz',
            'minimum_order' => 100,
            'unit_price' => 170,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Donec pretium vulputate sapien nec. Arcu felis bibendum ut tristique. Sed felis eget velit aliquet sagittis id. Dui id ornare arcu odio ut sem. Dui id ornare arcu odio ut sem nulla pharetra. Aliquam id diam maecenas ultricies mi. Convallis tellus id interdum velit laoreet id donec ultrices tincidunt. Fermentum et sollicitudin ac orci. In massa tempor nec feugiat nisl pretium fusce id. Varius quam quisque id diam vel quam. Sed viverra ipsum nunc aliquet.',
            'category_id' => 2,
        ]);

        Service::factory()->create([
            'name' => 'Baju Kaos Cotton 30s',
            'minimum_order' => 100,
            'unit_price' => 210,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Donec pretium vulputate sapien nec. Arcu felis bibendum ut tristique. Sed felis eget velit aliquet sagittis id. Dui id ornare arcu odio ut sem. Dui id ornare arcu odio ut sem nulla pharetra. Aliquam id diam maecenas ultricies mi. Convallis tellus id interdum velit laoreet id donec ultrices tincidunt. Fermentum et sollicitudin ac orci. In massa tempor nec feugiat nisl pretium fusce id. Varius quam quisque id diam vel quam. Sed viverra ipsum nunc aliquet.',
            'category_id' => 3,
        ]);

        Service::factory()->create([
            'name' => 'Tas Spondbond',
            'minimum_order' => 100,
            'unit_price' => 400,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Donec pretium vulputate sapien nec. Arcu felis bibendum ut tristique. Sed felis eget velit aliquet sagittis id. Dui id ornare arcu odio ut sem. Dui id ornare arcu odio ut sem nulla pharetra. Aliquam id diam maecenas ultricies mi. Convallis tellus id interdum velit laoreet id donec ultrices tincidunt. Fermentum et sollicitudin ac orci. In massa tempor nec feugiat nisl pretium fusce id. Varius quam quisque id diam vel quam. Sed viverra ipsum nunc aliquet.',
            'category_id' => 4,
        ]);
    }
}
