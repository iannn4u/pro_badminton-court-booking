<?php

namespace App\Filament\Resources\BookingResource\Pages;

use App\Filament\Resources\BookingResource;
use App\Models\Booking;
use Carbon\Carbon;
use Filament\Resources\Pages\CreateRecord;

class CreateBooking extends CreateRecord
{
    protected static string $resource = BookingResource::class;

    private function index($data, $lastdata)
    {
        $date = Carbon::now();
        $currentDate = Carbon::createFromFormat('Y-m-d', $data["date_booking"]);
        for ($i = 0; $i < 3; $i++) {
            if (!is_array($data["time_booking"])) {
                Booking::insert([
                    "name_booking" => $data["name_booking"],
                    "date_booking" =>  $currentDate->format('Y-m-d'),
                    "time_booking" => $data['time_booking'],
                    "court_booking" => $data["court_booking"],
                    // "method_payment" => $data["method_payment"],
                    // "message_booking" => $data["message_booking"],
                    "created_at" => $date->format('Y-m-d H:i:s'),
                    "updated_at" => $date->format('Y-m-d H:i:s')
                ]);
            } else {
                foreach ($data['time_booking'] as $time => $value) {
                    Booking::insert([
                        "name_booking" => $data["name_booking"],
                        "date_booking" =>  $currentDate->format('Y-m-d'),
                        "time_booking" => $value,
                        "court_booking" => $data["court_booking"],
                        // "method_payment" => $data["method_payment"],
                        // "message_booking" => $data["message_booking"],
                        "created_at" => $date->format('Y-m-d H:i:s'),
                        "updated_at" => $date->format('Y-m-d H:i:s')
                    ]);
                }
            }
            $currentDate->addWeek();
        }
        if ($lastdata) {
            foreach ($lastdata as $data => $value) {
                Booking::insert([
                    "name_booking" => $value["name_booking"],
                    "date_booking" =>  $value['date_booking'],
                    "time_booking" => $value['time_booking'],
                    "court_booking" => $value["court_booking"],
                    // "method_payment" => $value["method_payment"],
                    // "message_booking" => $value["message_booking"],
                    "created_at" => $value["created_at"],
                    "updated_at" => $value["updated_at"]
                ]);
            }
        }
    }



    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $realData = [];
        $tempData = $data;
        $lastData = [];
        $currentDate = Carbon::createFromFormat('Y-m-d', $data["date_booking"]);
        $date = Carbon::now();

        if ($data['member']) {
            for ($i = 2; $i > 0; $i--) {
                if ($i == 2) {
                    $currentDate->addWeek(4);
                    foreach ($data['time_booking'] as $time => $value) {
                        $tempData['time_booking'] = $value;
                        $tempData['date_booking'] = $currentDate->format('Y-m-d');
                        $realData[$time] = $tempData;
                    }
                    foreach ($realData as $dataSlotTerakhir => $value) {
                        unset($value['member']);
                        if ($dataSlotTerakhir != count($realData) - 1) {
                            $lastData[] = [
                                "name_booking" => $value["name_booking"],
                                "date_booking" =>  $value['date_booking'],
                                "time_booking" => $value['time_booking'],
                                "court_booking" => $value["court_booking"],
                                // "method_payment" => $value["method_payment"],
                                // "message_booking" => $value["message_booking"],
                                "created_at" => $date->format('Y-m-d H:i:s'),
                                "updated_at" => $date->format('Y-m-d H:i:s')
                            ];
                        }
                    }
                } else {
                    $this->index($data, $lastData);
                }
            }
            $lastofus = end($realData);
            unset($lastofus['member']);
            return $lastofus;
        } else {
            foreach ($data['time_booking'] as $time) {
                $data["time_booking"] = $time;
                $realData = $data;
            }
            unset($realData['member']);
            return $realData;
        }
    }


    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
