<?php

namespace App\Http\Middleware;

use App\Models\Booking;
use App\Models\Laporan;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteExpiredBookings
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Booking::where('date_booking', '<', Carbon::now()->format('Y-m-d'))
            ->where('expired', 0)
            ->update(['expired' => 1]);
        Booking::where('date_booking', '<', Carbon::now()->format('Y-m-d'))->delete();

        $softDeletedBookings = Booking::onlyTrashed()->where('expired', 0)->get();

        foreach ($softDeletedBookings as $booking) {
        $matchingReports = Laporan::where('court_booking', $booking->court_booking)
                ->where('date_booking', $booking->date_booking)
                ->where('time_booking', $booking->time_booking)
                ->get();

            foreach ($matchingReports as $report) {
                $report->delete();
            }
        }
                
        return $next($request);
    }
}
