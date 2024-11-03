<?php

namespace App\Filament\Resources\BookingResource\Pages;

use App\Filament\Resources\BookingResource;
use App\Models\Booking;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBooking extends CreateRecord
{
    protected static string $resource = BookingResource::class;

    private function index($data, $time)
    {
        Booking::insert([
            "name_booking" => $data["name_booking"],
            "date_booking" => $data["date_booking"],
            "time_booking" => $data["time_booking"][$time],
            "court_booking" => $data["court_booking"],
            "method_payment" => $data["method_payment"],
            "message_booking" => $data["message_booking"]
        ]);
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $realData = [];
        if (count($data['time_booking'])) {
            for ($i = 0; $i < count($data['time_booking']); $i++) {
                if ($i != count($data['time_booking']) - 1) {
                    $this->index($data, $i);
                } else {
                    $realData = [
                        "name_booking" => $data["name_booking"],
                        "date_booking" => $data["date_booking"],
                        "time_booking" => $data["time_booking"][$i],
                        "court_booking" => $data["court_booking"],
                        "method_payment" => $data["method_payment"],
                        "message_booking" => $data["message_booking"]
                    ];
                }
            }
        }

        return $realData;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
