<?php

namespace App\Http\Middleware;

use App\Models\Booking;
use App\Models\Pelanggan;
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
        $dateParse = Carbon::parse($request->date_booking);
        $today = Carbon::today();

        // Validasi tanggal tidak boleh lebih kecil dari hari ini
        if ($dateParse->lessThan($today)) {
            return redirect()->back()->withErrors(['date_booking' => 'Tanggal pemesanan harus hari ini atau yang akan datang.'])->withInput();
        }
        $bookings = Booking::all()->filter(function ($booking) use ($today) {
            $bookingDate = Carbon::parse($booking->date_booking);
            return $bookingDate < $today;
        });

        if ($bookings->isNotEmpty()) {
            foreach ($bookings as $booking) {
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
