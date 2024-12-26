<?php

namespace App\Http\Controllers;

use App\Models\Operational;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        // $data = [
        //     "week" => []
        // ];
        // $tanggalMulai = Carbon::today();

        // for ($minggu = 1; $minggu <= 7; $minggu++) {
        //     $data["week"][$minggu][] = $tanggalMulai->translatedFormat('D') . " " . $tanggalMulai->format('j/n/y');
        //     for ($jam = 8; $jam < 23; $jam++) {
        //         $slotJamMulai = sprintf('%02d.00', $jam);
        //         $slotJamSelesai = sprintf('%02d.00', $jam + 1);
        //         $data["week"][$minggu][] = "$slotJamMulai - $slotJamSelesai";
        //     }
        //     $tanggalMulai->addDay();
        // }
        $operational = Operational::get()->first();

        $data["time_open"] = $operational->time_open;
        $data["time_close"] = $operational->time_close;
        $data["date_slot_week"] = $this->formatTanggal();

        return view("index", $data);
    }

    private function formatTanggal()
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
        $dataTanggal = [];

        for ($i = 0; $i < 7; $i++) {
            $tanggalHariIni = Carbon::now();
            $tanggalHariIni->addDays($i);
            $formatTanggal = $tanggalHariIni->format('D j/n/y');
            $tanggalSudahFormat = str_replace(array_keys($namaHariIndonesia), array_values($namaHariIndonesia), $formatTanggal);
            $dataTanggal[] = $tanggalSudahFormat;
        }

        return $dataTanggal;
    }
}
