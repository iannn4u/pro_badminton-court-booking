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

        $keuanganBulanIni = Booking::whereMonth('date_booking', Carbon::now()->month)
            ->whereYear('date_booking', Carbon::now()->year)
            ->sum('price_booking'); // Hitung langsung menggunakan sum()

        $formattedKeuanganBulanIni = 'Rp ' . number_format($keuanganBulanIni, 0, ',', '.');

        return [
            Stat::make('Jumlah Pengunjung Hari Ini', $jumlahPengunjung),
            Stat::make('Income Bulan Ini', $formattedKeuanganBulanIni),
        ];
    }
}