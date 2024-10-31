<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Court;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data["courts"] = Court::all();

        return view('admin.booking.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        dd($request);
        if (count($request->time_booking) > 1) {
            $lamaMain = count($request->time_booking) - 1;
            $jamMulai = $request->time_booking[0] < 10 ? '0' . $request->time_booking[0] . '.00' : $request->time_booking[0] . '.00';
            $jamSelesai = $request->time_booking[$lamaMain] < 10 ? '0' . $request->time_booking[$lamaMain] + 1 . '.00' : $request->time_booking[$lamaMain] + 1 . '.00';
            $jamMain = $jamMulai . ' - ' . $jamSelesai;
        } else {
            $jamMulai = $request->time_booking[0] < 10 ? '0' . $request->time_booking[0] . '.00' : $request->time_booking[0] . '.00';
            $jamSelesai = $request->time_booking[0] + 1 < 10 ? '0' . $request->time_booking[0] + 1 . '.00' : $request->time_booking[0] + 1 . '.00';
            $jamMain = $jamMulai . ' - ' . $jamSelesai;
            $jamMain = $jamMulai . ' - ' . $jamSelesai;
        }

        $data = [
            'name_booking' => $request->name_booking,
            'date_booking' => $request->date_booking,
            'time_booking' => $jamMain,
            'court_booking' => $request->court_booking,
            'method_payment' => $request->method_payment,
            'message_booking' => $request->description
        ];
        Booking::create($data);
        session()->flash('message', 'Berhasil menambahkan jadwal.');
        return redirect('/admin');
    }

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
