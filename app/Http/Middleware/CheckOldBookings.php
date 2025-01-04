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
        $today = now()->format('d-m-Y');

        $bookings = Booking::all()->filter(function ($booking) use ($today) {
            $bookingDate = Carbon::createFromFormat('d-m-Y', $booking->date_booking);
            return $bookingDate < $today;
        });

        if ($bookings->isNotEmpty()) {
            foreach ($bookings as $booking) {
                $booking->update(["status_delete_booking" => 1]);
                $booking->delete();
            }
        }

        $today = Carbon::now();
        $oneMonthAgo = $today->subMonth();
        $pelanggans = Pelanggan::all()->filter(function ($pelanggan) use ($oneMonthAgo) {
            $pelangganDate = Carbon::createFromFormat('d-m-Y', $pelanggan->last_playing);
            return $pelangganDate < $oneMonthAgo;
        });
        
        foreach ($pelanggans as $pelanggan) {
            $pelanggan->update(['status' => 'tidak aktif']);
        }

        return $next($request);
    }
}
