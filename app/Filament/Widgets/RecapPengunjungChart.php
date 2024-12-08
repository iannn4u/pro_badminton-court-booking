<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class RecapPengunjungChart extends ChartWidget
{
    protected static ?string $heading = 'Recap Pengunjung';

    protected function getData(): array
    {
        $data = [];
        $labels = [];

        // Loop untuk mendapatkan data pengunjung selama 5 bulan terakhir
        for ($i = 4; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $monthName = $month->format('M'); // Nama bulan (contoh: Jan, Feb)
            $pengunjungCount = Booking::whereMonth('date_booking', $month->month)
                ->whereYear('date_booking', $month->year)
                ->count(); // Hitung total pengunjung bulan tersebut (sudah integer)

            $data[] = $pengunjungCount;
            $labels[] = $monthName;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pengunjung',
                    'data' => $data,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.6)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $labels, // Nama bulan untuk sumbu X
            'options' => [
                'scales' => [
                    'y' => [
                        'beginAtZero' => true, // Mulai dari 0
                        'ticks' => [
                            'stepSize' => 1, // Memastikan hanya bilangan bulat
                            'precision' => 0, // Memastikan bilangan bulat
                        ],
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // Tipe chart batang
    }
}
