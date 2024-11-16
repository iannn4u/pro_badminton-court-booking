<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['name_booking', 'date_booking', 'time_booking', 'court_booking', 'method_payment', 'message_booking'];
    public $primaryKey = 'id_booking';
    public $incrementing = true;
    protected $keyType = 'int';

    public static function getAvailableSlotsForCourtAndDate($date, $court, $allSlots)
    {
        $formattedDate = Carbon::parse($date)->format('Y-m-d');

        $bookedSlots = self::where('date_booking', $formattedDate)
            ->where('court_booking', $court)
            ->pluck('time_booking')
            ->toArray();

        $availableSlots = array_diff($allSlots, $bookedSlots);

        return array_combine($availableSlots, $availableSlots);
    }
}
