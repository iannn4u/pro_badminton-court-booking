<?php

namespace Database\Seeders;

use App\Models\Court;
use App\Models\Operational;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Court::insert([
            [
                'name_court' => 'Lapangan 1',
                'price_court' => '45000',
                // 'description_court' => 'Hello World!',
            ],
            [
                'name_court' => 'Lapangan 2',
                'price_court' => '45000',
                // 'description_court' => 'Hello World!',
            ],
            [
                'name_court' => 'Lapangan 3',
                'price_court' => '45000',
                // 'description_court' => 'Hello World!',
            ]
        ]);

        Operational::create([
            'open' => '08.00',
            'close' => '23.00'
        ]);
    }
}
