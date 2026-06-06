<?php

namespace App\Http\Middleware;

use App\Models\Booking;
use App\Models\Pelanggan;
use App\Models\Report;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckOldBookings
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $today = Carbon::today();
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $report = Report::where('bulan', $currentMonth)
            ->where('tahun', $currentYear)
            ->first();

        if (!$report) {
            Report::create(["tahun" => $currentYear, "bulan" => $currentMonth]);
        }

        $bookings = Booking::all()->filter(function ($booking) use ($today) {
            $bookingDate = Carbon::parse($booking->date_booking);
            return $bookingDate < $today;
        });

        if ($bookings->isNotEmpty()) {
            foreach ($bookings as $booking) {
                if ($booking->id_pelanggan) {
                    $booking->pelanggan->update(['last_playing' => $today->format('Y-m-d'), 'playing' => $booking->pelanggan->playing + 1]);
                }

                $report->update(["kunjungan" => $report->kunjungan + 1]);

                $booking->update(["status_delete_booking" => 1]);
                $booking->delete();
            }
        }

        $oneMonthAgo = $today->subMonth();
        $pelanggans = Pelanggan::all()->filter(function ($pelanggan) use ($oneMonthAgo) {
            $pelangganDate = Carbon::parse($pelanggan->last_playing);
            return $pelangganDate < $oneMonthAgo;
        });

        if ($pelanggans->isNotEmpty()) {
            foreach ($pelanggans as $pelanggan) {
                $pelanggan->update(['status' => 'tidak aktif']);
            }
        }

        return $next($request);
    }
}
