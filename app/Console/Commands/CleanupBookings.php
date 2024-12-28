<?php

namespace App\Console\Commands;

use App\Models\Booking;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;

class CleanupBookings extends Command
{
    protected $signature = 'cleanup:bookings';
    protected $description = 'Delete old bookings and mark as deleted';

    public function handle()
    {
        $today = now()->format('d-m-Y');

        $bookings = Booking::where('date_booking', '<', $today)->get();

        if ($bookings->isNotEmpty()) {
            foreach ($bookings as $booking) {
                $booking->update(["status_delete_booking" => 1]);
                $booking->delete();
            }
        }
    }

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('cleanup:bookings')->daily();
    }
}
