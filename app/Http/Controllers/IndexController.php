<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Court;
use App\Models\Highlight;
use App\Models\Operational;
use App\Models\Pelanggan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $search = '';
        $pelanggans = Pelanggan::where('name', 'like', "%{$search}%")->get();
dd(response()->json($pelanggans));
        $operational = Operational::first();
        $data = $this->week($operational->time_open, $operational->time_close);
        $data["time_close"] = $operational->time_close;
        $data["time_open"] = $operational->time_open;
        $data["courts"] = Court::all();
        $data["highlights"] = Highlight::all();
        $data['todaySchedule'] = $this->day();
        $data["operational"] = Operational::first();
        $operational = Operational::first();
        $data["photos_preview"] = [];
        if (!empty($operational->photos_place)) {
            $existingPhotos = json_decode($operational->photos_place, true);

            foreach ($existingPhotos as $photo) {
                $data["photos_preview"][] = $photo;
            }
        }

        return view("index", $data);
    }

    private function day()
    {
        $data['courts'] = Court::all();
        $operational = Operational::first();
        $time_close = $operational->time_close;
        $time_open = $operational->time_open;
        $partsTimeOpen = explode(':', $time_open);
        $partsTimeClose = explode(':', $time_close);
        $incrementOpen = (int) $partsTimeOpen[0];
        $incrementClose = (int) $partsTimeClose[0] == 0 ? 24 : (int) $partsTimeClose[0];
        for ($hour = $incrementOpen; $hour < $incrementClose; $hour++) {
            $timeSlot = ($hour < 10 ? '0' . $hour . '.00' : $hour . '.00') . ' - ' . (($hour + 1) < 10 ? '0' . ($hour + 1) . '.00' : ($hour + 1) . '.00');
            $checkingSlot[] = $timeSlot;
        }

        $today = Carbon::now();
        $formatTanggal = $today->format('d-m-Y');
        $data["slotJamHariIni"] = $checkingSlot;
        $todaySchedule = [];
        if (!$data["courts"]->isEmpty()) {
            foreach ($checkingSlot as $time) {
                $row = ['time' => $time];
                foreach ($data['courts'] as $court) {
                    $booking = Booking::where('date_booking', $formatTanggal)
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
        } else {
            foreach ($checkingSlot as $time) {
                $row = ['time' => $time];
                $row['courts'] = null;
                $todaySchedule[] = $row;
            }
        }

        return $todaySchedule;
    }

    private function week($time_open, $time_close)
    {
        $namaHariIndonesia = [
            'Mon' => 'Sen',
            'Tue' => 'Sel',
            'Wed' => 'Rab',
            'Thu' => 'Kam',
            'Fri' => 'Jum',
            'Sat' => 'Sab',
            'Sun' => 'Min',
        ];
        $data = [];

        $partsTimeOpen = explode(':', $time_open);
        $partsTimeClose = explode(':', $time_close);
        $incrementOpen = (int) $partsTimeOpen[0];
        $incrementClose = (int) $partsTimeClose[0] == 0 ? 24 : (int) $partsTimeClose[0];

        for ($i = 0; $i < 7; $i++) {
            $tanggalHariIni = Carbon::now()->addDays($i);
            $formatTanggal = $tanggalHariIni->format('D j/n/y');
            $tanggalSudahFormat = str_replace(array_keys($namaHariIndonesia), array_values($namaHariIndonesia), $formatTanggal);
            $partTanggal = explode(" ", $tanggalSudahFormat);
            $tanggalQuery = Carbon::createFromFormat('d/m/y', $partTanggal[1])->format('d-m-Y');

            $slotWaktu = [];

            // Ambil semua lapangan
            $courts = Court::all()->pluck("name_court");

            for ($jamBuka = $incrementOpen; $jamBuka < $incrementClose; $jamBuka++) {
                $timeSlot = ($jamBuka < 10 ? '0' . $jamBuka . '.00' : $jamBuka . '.00') . ' - ' .
                    ($jamBuka + 1 < 10 ? '0' . ($jamBuka + 1) . '.00' : ($jamBuka + 1) . '.00');

                // Hitung jumlah lapangan yang sudah ter-booked pada slot waktu ini
                $bookedCount = Booking::where("date_booking", $tanggalQuery)
                    ->whereIn("court_booking", $courts) // Cek semua lapangan
                    ->where("time_booking", $timeSlot)
                    ->count();

                // Jika semua lapangan ter-booked, tandai sebagai penuh
                $isBooked = $bookedCount === count($courts) ? 1 : 0;

                $slotWaktu[] = [
                    "full_booked" => $isBooked,
                    $timeSlot
                ];
            }

            $data["week"][$tanggalSudahFormat] = $slotWaktu;
        }

        return $data;
    }
}
