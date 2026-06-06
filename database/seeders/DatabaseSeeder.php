<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Biodata;
use App\Models\Booking;
use App\Models\Court;
use App\Models\Highlight;
use App\Models\Operational;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use PhpParser\JsonDecoder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'role' => 'admin'
        ]);

        $currentDate = Carbon::now();

        Operational::factory()->create([
            "time_open" => "08:00",
            "time_close" => "23:00",
            "name_biodata" => "GOR Puja Bangsa",
            "address_biodata" => "Jl. Setia Budi, Karangasih, Kec. Cikarang Utara, Kabupaten Bekasi, Jawa Barat 17530",
            "link_address_biodata" => "https://maps.app.goo.gl/A4VPuoEW1NM7LHgt6",
            "wa_biodata" => "0812 3456 7891",
            "link_wa_biodata" => "/"
        ]);

        // Booking::insert([
        //     [
        //         "name_booking" => "Alandrian",
        //         "date_booking" => $currentDate->format("d-m-Y"),
        //         "time_booking" => "08.00 - 09.00",
        //         "court_booking" => "Lapangan 2",
        //         "price_booking" => "45000",
        //     ],
        //     [
        //         "name_booking" => "Surya",
        //         "date_booking" => $currentDate->format("d-m-Y"),
        //         "time_booking" => "21.00 - 22.00",
        //         "court_booking" => "Lapangan 1",
        //         "price_booking" => "45000",
        //     ],
        //     [
        //         "name_booking" => "Tantra",
        //         "date_booking" => $currentDate->format("d-m-Y"),
        //         "time_booking" => "22.00 - 23.00",
        //         "court_booking" => "Lapangan 1",
        //         "price_booking" => "45000",
        //     ],
        //     [
        //         "name_booking" => "Tantra",
        //         "date_booking" => $currentDate->format("d-m-Y"),
        //         "time_booking" => "22.00 - 23.00",
        //         "court_booking" => "Lapangan 2",
        //         "price_booking" => "45000",
        //     ],
        //     [
        //         "name_booking" => "Tantra",
        //         "date_booking" => $currentDate->format("d-m-Y"),
        //         "time_booking" => "22.00 - 23.00",
        //         "court_booking" => "Lapangan 3",
        //         "price_booking" => "45000",
        //     ]
        // ]);

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
