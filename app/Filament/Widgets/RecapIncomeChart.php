<?php

namespace App\Filament\Widgets;

use App\Models\Laporan;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class RecapIncomeChart extends ChartWidget
{
    protected static ?string $heading = 'Recap Income';

    protected function getData(): array
    {
        $data = [];
        $labels = [];
        $totalIncome = 0;

        // Ambil data 5 bulan terakhir
        for ($i = 4; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $monthName = $month->format('M'); // Nama bulan
            $income = Laporan::whereMonth('date_booking', $month->month)
                ->whereYear('date_booking', $month->year)
                ->sum('price_booking');

            $data[] = $income;
            $labels[] = $monthName;

            $totalIncome += $income;
        }

        // Hitung rata-rata pendapatan
        $averageIncome = count($data) > 0 ? $totalIncome / count($data) : 0;

        // Tentukan sumbu Y dari 0 hingga kelipatan rata-rata pendapatan
        $yAxisMax = ceil($averageIncome / 1000) * 1000 * 2; // Dibulatkan ke kelipatan 1000, dikali 2 untuk memberi jarak atas

        return [
            'datasets' => [
                [
                    'label' => 'Pendapatan Bulanan',
                    'data' => $data,
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 2,
                ],
            ],
            'labels' => $labels,
            'options' => [
                'scales' => [
                    'y' => [
                        'beginAtZero' => true,
                        'max' => $yAxisMax, // Sumbu Y diatur berdasarkan rata-rata
                        'ticks' => [
                            'stepSize' => ceil($yAxisMax / 5), // Interval sumbu Y
                        ],
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
