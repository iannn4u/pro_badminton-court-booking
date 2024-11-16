<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Court;
use App\Models\Operational;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $operational = Operational::first();
        $openHour = (int) $operational->open;
        $closeHour = (int) $operational->close;

        for ($hour = $openHour; $hour < $closeHour; $hour++) {
            $timeSlot = ($hour < 10 ? '0' . $hour . '.00' : $hour . '.00') . ' - ' . (($hour + 1) < 10 ? '0' . ($hour + 1) . '.00' : ($hour + 1) . '.00');
            $checkingSlot[] = $timeSlot;
        }

        $data["slotJamHariIni"] = $checkingSlot;

        for ($hour = $openHour; $hour < $closeHour; $hour++) {
            $timeSlot = $hour < 10 ? '0' . $hour . '.00' : $hour . '.00';
            $time_booking[] = $timeSlot;
        }


        Carbon::setLocale("id");
        $data['courts'] = Court::all();
        $today = Carbon::today()->toDateString();
        $daysInIndonesian = [
            'Sun' => 'Min',
            'Mon' => 'Sen',
            'Tue' => 'Sel',
            'Wed' => 'Rab',
            'Thu' => 'Kam',
            'Fri' => 'Jum',
            'Sat' => 'Sab',
        ];

        $todaySchedule = [];
        if (!$data["courts"]->isEmpty()) {
            foreach ($checkingSlot as $time) {
                $row = ['time' => $time];
                foreach ($data['courts'] as $court) {
                    $booking = Booking::where('date_booking', $today)
                        ->where('time_booking', $time)
                        ->where('court_booking', $court->name_court)
                        ->first();
                    if ($booking) {
                        $row['courts'][] = [
                            'status' => 'booked',
                            'name' => $booking->name_booking,
                        ];
                    } else {
                        $row['courts'][] = [
                            'status' => 'available',
                            'name' => 'Tersedia',
                        ];
                    }
                }
                $todaySchedule[] = $row;
            }
        }


        $data['todaySchedule'] = $todaySchedule;

        for ($i = 0; $i < 7; $i++) {
            $date = Carbon::now()->addDays($i);
            $day = $daysInIndonesian[$date->format('D')];
            $dailyBookings = [];

            foreach ($checkingSlot as $timeSlot => $value) {
                $bookingsForSlot = Booking::where('date_booking', $date->toDateString())->where("time_booking", $value)->get();
                $dailyBookings[] = [
                    'is_full' => $bookingsForSlot->count() >= 3,
                    'bookings' => $bookingsForSlot,
                ];
            }

            foreach ($time_booking as $time => $value) {
                $dailyBookings[$time]['time'] = $value;
            }

            $data['dates'][] = [
                'day' => $day,
                'date' => $date->format('j/n'),
                'slots' => $dailyBookings,
            ];
        }

        return view('index', $data);
    }
}
