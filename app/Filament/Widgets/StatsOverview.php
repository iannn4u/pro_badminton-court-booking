<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use App\Models\Laporan;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $jumlahPengunjung = Booking::whereDate('date_booking', Carbon::today())->count();
        $jumlahPengunjungBulanIni = Laporan::whereMonth('date_booking', Carbon::now()->month)->whereYear('date_booking', Carbon::now()->year)->get();
        $keuanganBulanIni = 0;
        foreach ($jumlahPengunjungBulanIni as $pengunjung) {
            $keuanganBulanIni += (int)$pengunjung->price_booking;
        }
        
        $formattedKeuanganBulanIni = 'Rp ' . number_format($keuanganBulanIni, 0, ',', '.');

        return [
            Stat::make('Jumlah Pengunjung Hari Ini', $jumlahPengunjung),
            Stat::make('Income Bulan Ini', $formattedKeuanganBulanIni),
            Stat::make('Average time on page', '3:12'),
        ];
    }
}
