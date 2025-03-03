<?php

namespace App\Console\Commands;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;

class CleanupBookings extends Command
{
    protected $signature = 'cleanup:bookings';
    protected $description = 'Delete old bookings and mark as deleted';

    public function handle()
    {
        $today = now()->format('Y-m-d');
        $bookings = Booking::all()->filter(function ($booking) use ($today) {
            $dateBooking = Carbon::createFromFormat('d-m-Y', $booking->date_booking)->format('Y-m-d');
            return $dateBooking < $today;
        });

        if ($bookings->isNotEmpty()) {
            foreach ($bookings as $booking) {
                $booking->update(["status_delete_booking" => 1]);
                $booking->delete();
            }
        }
    }

    protected function schedule(Schedule $schedule)
    {
        //
    }
}
