<?php

namespace App\Filament\Resources\BookingResource\Pages;

use App\Filament\Resources\BookingResource;
use App\Models\Booking;
use App\Models\Court;
use App\Models\Laporan;
use Carbon\Carbon;
use Filament\Resources\Pages\CreateRecord;

class CreateBooking extends CreateRecord
{
    protected static string $resource = BookingResource::class;

    // private function index($data, $lastdata)
    // {
    //     $date = Carbon::now();
    //     $currentDate = Carbon::createFromFormat('Y-m-d', $data["date_booking"]);
    //     for ($i = 0; $i < 3; $i++) {
    //         if (!is_array($data["time_booking"])) {
    //             Booking::insert([
    //                 "name_booking" => $data["name_booking"],
    //                 "date_booking" =>  $currentDate->format('Y-m-d'),
    //                 "time_booking" => $data['time_booking'],
    //                 "court_booking" => $data["court_booking"],
    //                 // "method_payment" => $data["method_payment"],
    //                 // "message_booking" => $data["message_booking"],
    //                 "created_at" => $date->format('Y-m-d H:i:s'),
    //                 "updated_at" => $date->format('Y-m-d H:i:s')
    //             ]);
    //         } else {
    //             foreach ($data['time_booking'] as $time => $value) {
    //                 Booking::insert([
    //                     "name_booking" => $data["name_booking"],
    //                     "date_booking" =>  $currentDate->format('Y-m-d'),
    //                     "time_booking" => $value,
    //                     "court_booking" => $data["court_booking"],
    //                     // "method_payment" => $data["method_payment"],
    //                     // "message_booking" => $data["message_booking"],
    //                     "created_at" => $date->format('Y-m-d H:i:s'),
    //                     "updated_at" => $date->format('Y-m-d H:i:s')
    //                 ]);
    //             }
    //         }
    //         $currentDate->addWeek();
    //     }
    //     if ($lastdata) {
    //         foreach ($lastdata as $data => $value) {
    //             Booking::insert([
    //                 "name_booking" => $value["name_booking"],
    //                 "date_booking" =>  $value['date_booking'],
    //                 "time_booking" => $value['time_booking'],
    //                 "court_booking" => $value["court_booking"],
    //                 // "method_payment" => $value["method_payment"],
    //                 // "message_booking" => $value["message_booking"],
    //                 "created_at" => $value["created_at"],
    //                 "updated_at" => $value["updated_at"]
    //             ]);
    //         }
    //     }
    // }


    // private function addMoreScehdulePrivatePerson($datas) {
    //     foreach ($datas as $data => $value) {
    //         Booking::insert([
    //             "name_booking" => $value["name_booking"],
    //             "date_booking" =>  $value['date_booking'],
    //             "time_booking" => $value['time_booking'],
    //             "court_booking" => $value["court_booking"],
    //             // "method_payment" => $value["method_payment"],
    //             // "message_booking" => $value["message_booking"],
    //             "created_at" => $value["created_at"],
    //             "updated_at" => $value["updated_at"]
    //         ]);
    //     }
    // }


    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
    //     $realData = [];
    //     $tempData = $data;
    //     $lastData = [];
    //     $currentDate = Carbon::createFromFormat('Y-m-d', $data["date_booking"]);
    //     $date = Carbon::now();
    //     $court = Court::first();

    //     if ($data['member']) {
    //         for ($i = 0; $i < 4; $i++) {
    //             Laporan::insert([
    //                 'date_booking' => Carbon::createFromFormat('Y-m-d', ($i = 0) ? $data["date_booking"] : $currentDate->addWeek($i)),
    //                 'price_booking' => $court->price_court
    //             ]);
    //         }
    //         for ($i = 2; $i > 0; $i--) {
    //             if ($i == 2) {
    //                 $currentDate->addWeek(4);
    //                 foreach ($data['time_booking'] as $time => $value) {
    //                     $tempData['time_booking'] = $value;
    //                     $tempData['date_booking'] = $currentDate->format('Y-m-d');
    //                     $realData[$time] = $tempData;
    //                 }
    //                 foreach ($realData as $dataSlotTerakhir => $value) {
    //                     unset($value['member']);
    //                     if ($dataSlotTerakhir != count($realData) - 1) {
    //                         $lastData[] = [
    //                             "name_booking" => $value["name_booking"],
    //                             "date_booking" =>  $value['date_booking'],
    //                             "time_booking" => $value['time_booking'],
    //                             "court_booking" => $value["court_booking"],
    //                             // "method_payment" => $value["method_payment"],
    //                             // "message_booking" => $value["message_booking"],
    //                             "created_at" => $date->format('Y-m-d H:i:s'),
    //                             "updated_at" => $date->format('Y-m-d H:i:s')
    //                         ];
    //                     }
    //                 }
    //             } else {
    //                 $this->index($data, $lastData);
    //             }
    //         }
    //         $lastofus = end($realData);
    //         unset($lastofus['member']);
    //         return $lastofus;
    //     } else {
    //         foreach ($data['time_booking'] as $time => $value) {
    //             Laporan::insert([
    //                 'date_booking' => $value,
    //                 'price_booking' => $court->price_court
    //             ]);
    //             if($time == 0) {
    //                 $realData = [
    //                     "name_booking" => $data["name_booking"],
    //                     "date_booking" =>  $data['date_booking'],
    //                     "time_booking" => $value,
    //                     "court_booking" => $data["court_booking"],
    //                     // "method_payment" => $value["method_payment"],
    //                     // "message_booking" => $value["message_booking"],
    //                     "created_at" => $date->format('Y-m-d H:i:s'),
    //                     "updated_at" => $date->format('Y-m-d H:i:s')
    //                 ];
    //             } else{
    //                 $lastData[] = [
    //                     "name_booking" => $data["name_booking"],
    //                     "date_booking" =>  $data['date_booking'],
    //                     "time_booking" => $value,
    //                     "court_booking" => $data["court_booking"],
    //                     // "method_payment" => $value["method_payment"],
    //                     // "message_booking" => $value["message_booking"],
    //                     "created_at" => $date->format('Y-m-d H:i:s'),
    //                     "updated_at" => $date->format('Y-m-d H:i:s')
    //                 ];
    //             }
    //         }
    //         unset($realData['member']);
    //         $this->addMoreScehdulePrivatePerson($lastData);
    //         return $realData;
    //     }
    // }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if ($data["member"]) {
            $data = $this->addNewDataMember($data);
        } else {
            $data = $this->addNewDataNotMember($data);
        }

        return $data;
    }

    private function addNewDataMember($data)
    {
        $tanggalBookingPertama = Carbon::createFromFormat('Y-m-d', $data["date_booking"]);
        $date = Carbon::now();
        $court = Court::where("name_court", $data["court_booking"])->first();

        unset($data["member"]);
        for ($i = 0; $i < 4; $i++) {
            if (count($data["time_booking"]) == 1) {
                Laporan::create([
                    "date_booking" => $tanggalBookingPertama->format('Y-m-d'),
                    "price_booking" => $court->price_court,
                    "court_booking" => $data["court_booking"],
                    "time_booking" => $data["time_booking"][0]
                ]);
                if ($i == 3) {
                    $singleData = [
                        "name_booking" => $data["name_booking"],
                        "date_booking" => $tanggalBookingPertama->format('Y-m-d'),
                        "time_booking" => $data["time_booking"][0],
                        "court_booking" => $data["court_booking"],
                        "price_booking" => $court->price_court,
                        // "method_payment" => $value["method_payment"],
                        // "message_booking" => $value["message_booking"],
                        "created_at" => $date->format('Y-m-d H:i:s'),
                        "updated_at" => $date->format('Y-m-d H:i:s')
                    ];
                } else {
                    Booking::create([
                        "name_booking" => $data["name_booking"],
                        "date_booking" =>  $tanggalBookingPertama->format('Y-m-d'),
                        "time_booking" => $data["time_booking"][0],
                        "court_booking" => $data["court_booking"],
                        "price_booking" => $court->price_court,
                        // "method_payment" => $value["method_payment"],
                        // "message_booking" => $value["message_booking"],
                        "created_at" => $date->format('Y-m-d H:i:s'),
                        "updated_at" => $date->format('Y-m-d H:i:s')
                    ]);
                }
            } else {
                $endDataTimeBooking = end($data["time_booking"]);

                foreach ($data["time_booking"] as $time) {
                    Laporan::create([
                        "date_booking" => $tanggalBookingPertama->format('Y-m-d'),
                        "price_booking" => $court->price_court,
                        "court_booking" => $data["court_booking"],
                        "time_booking" => $time
                    ]);
                    if ($endDataTimeBooking == $time && $i == 3) {
                        $singleData = [
                            "name_booking" => $data["name_booking"],
                            "date_booking" =>   $tanggalBookingPertama->format('Y-m-d'),
                            "time_booking" => $time,
                            "court_booking" => $data["court_booking"],
                            "price_booking" => $court->price_court,
                            // "method_payment" => $value["method_payment"],
                            // "message_booking" => $value["message_booking"],
                            "created_at" => $date->format('Y-m-d H:i:s'),
                            "updated_at" => $date->format('Y-m-d H:i:s')
                        ];
                    } else {
                        Booking::create([
                            "name_booking" => $data["name_booking"],
                            "date_booking" =>  $tanggalBookingPertama->format('Y-m-d'),
                            "time_booking" => $time,
                            "court_booking" => $data["court_booking"],
                            "price_booking" => $court->price_court,
                            // "method_payment" => $value["method_payment"],
                            // "message_booking" => $value["message_booking"],
                            "created_at" => $date->format('Y-m-d H:i:s'),
                            "updated_at" => $date->format('Y-m-d H:i:s')
                        ]);
                    }
                }
            }

            $tanggalBookingPertama->addWeek($i + 1);
        }
        return $singleData;
    }

    private function addNewDataNotMember($data)
    {
        $date = Carbon::now();
        $court = Court::where("name_court", $data["court_booking"])->first();
        unset($data["member"]);

        if (count($data["time_booking"]) == 1) {
            Laporan::create([
                "date_booking" => $data["date_booking"],
                "price_booking" => $court->price_court,
                "court_booking" => $data["court_booking"],
                "time_booking" => $data["time_booking"][0]
            ]);
            $data["price_booking"] = $court->price_court;
            $data["time_booking"] = $data["time_booking"][0];
            return $data;
        } else {
            $endDataTimeBooking = end($data["time_booking"]);

            foreach ($data["time_booking"] as $time) {
                Laporan::create([
                    "date_booking" => $data["date_booking"],
                    "price_booking" => $court->price_court,
                    "time_booking" => $time,
                    "court_booking" => $data["court_booking"],
                ]);
                if ($time == $endDataTimeBooking) {
                    $singleData = [
                        "name_booking" => $data["name_booking"],
                        "date_booking" =>  $data['date_booking'],
                        "time_booking" => $time,
                        "court_booking" => $data["court_booking"],
                        "price_booking" => $court->price_court,
                        // "method_payment" => $value["method_payment"],
                        // "message_booking" => $value["message_booking"],
                        "created_at" => $date->format('Y-m-d H:i:s'),
                        "updated_at" => $date->format('Y-m-d H:i:s')
                    ];
                } else {
                    Booking::create([
                        "name_booking" => $data["name_booking"],
                        "date_booking" =>  $data['date_booking'],
                        "time_booking" => $time,
                        "court_booking" => $data["court_booking"],
                        "price_booking" => $court->price_court,
                        // "method_payment" => $value["method_payment"],
                        // "message_booking" => $value["message_booking"],
                        "created_at" => $date->format('Y-m-d H:i:s'),
                        "updated_at" => $date->format('Y-m-d H:i:s')
                    ]);
                }
            }
        }

        return $singleData;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
