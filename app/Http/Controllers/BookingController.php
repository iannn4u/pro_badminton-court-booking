<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Court;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $time = $request->input('time');
        $date = $request->input('date');
        $formattedDate = Carbon::createFromFormat('d/m', $date)
            ->year(Carbon::now()->year)
            ->format('Y-m-d');
        $jamAwal = (int) explode('.', $time)[0];
        $jamAkhir = $jamAwal + 1;
        $slotJam = $time . ' - ' . ($jamAkhir < 10 ? '0' . $jamAkhir . '.00' : $jamAkhir . '.00');
        $result = Booking::where('time_booking', $slotJam)->where('date_booking', $formattedDate)->get();

        $data = [
            'response' => 200,
        ];
        foreach ($result as $r => $value) {
            $data['bookings'][$r] = [
                "name_booking" => $value->name_booking,
                "court_booking" => $value->court_booking,
                "message_booking" => $value->message_booking
            ];
        }

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request) {}

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
