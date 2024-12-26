<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Booking;
use App\Models\Court;
use App\Models\Operational;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $currentDate = Carbon::now();

        Operational::factory()->create([
            "time_open" => "08:00",
            "time_close" => "23:00",
        ]);

        Booking::insert([
            [
                "name_booking" => "Alandrian",
                "date_booking" => $currentDate->format("d-m-Y"),
                "time_booking" => "08.00 - 09.00",
                "court_booking" => "Lapangan 2",
            ],
            [
                "name_booking" => "Surya",
                "date_booking" => $currentDate->format("d-m-Y"),
                "time_booking" => "22.00 - 23.00",
                "court_booking" => "Lapangan 1",
            ],
            [
                "name_booking" => "Tantra",
                "date_booking" => $currentDate->format("d-m-Y"),
                "time_booking" => "22.00 - 23.00",
                "court_booking" => "Lapangan 1",
            ],
            [
                "name_booking" => "Tantra",
                "date_booking" => $currentDate->format("d-m-Y"),
                "time_booking" => "22.00 - 23.00",
                "court_booking" => "Lapangan 2",
            ],
            [
                "name_booking" => "Tantra",
                "date_booking" => $currentDate->format("d-m-Y"),
                "time_booking" => "22.00 - 23.00",
                "court_booking" => "Lapangan 3",
            ]
        ]);
        
        Court::insert([
            [
                'name_court' => 'Lapangan 1',
                'price_court' => '45000',
            ],
            [
                'name_court' => 'Lapangan 2',
                'price_court' => '45000',
            ],
            [
                'name_court' => 'Lapangan 3',
                'price_court' => '45000',
            ]
        ]);
    }
}
