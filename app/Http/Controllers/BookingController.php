<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Court;
use App\Models\Operational;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data["title"] = "Booking";
        $search = $request->input('search');

        $data["bookings"] = Booking::when($search, function ($query, $search) {
            $query->where('name_booking', 'like', "%$search%")
                ->orWhere('date_booking', 'like', "%$search%")
                ->orWhere('court_booking', 'like', "%$search%");
        })->get();

        return view("admin.booking.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data["title"] = "Tambah Booking";
        $data["courts"] = Court::all();
        $operational = Operational::get()->first();
        $partsTimeOpen = explode(':', $operational->time_open);
        $partsTimeClose = explode(':', $operational->time_close);
        $data["incrementOpen"] = (int)$partsTimeOpen[0];
        $data["incrementClose"] = (int)$partsTimeClose[0] == 0 ? 24 : (int)$partsTimeClose[0];

        return view("admin.booking.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_booking' => 'required|string|min:3',
            'date_booking' => 'required',
            'court_booking' => 'required|string',
            'time_booking' => 'required|array',
        ], [
            'name_booking.required' => 'Nama pemesanan wajib diisi.',
            'name_booking.string' => 'Nama pemesanan harus berupa teks.',
            'name_booking.min' => 'Nama pemesanan harus terdiri dari minimal 3 karakter.',
            'date_booking.required' => 'Silakan isi tanggal untuk pemesanan.',
            'court_booking.required' => 'Silakan pilih lapangan untuk pemesanan.',
            'court_booking.string' => 'Nama lapangan harus berupa teks.',
            'time_booking.required' => 'Silakan pilih minimal satu slot waktu untuk pemesanan.',
            'time_booking.array' => 'Slot waktu harus berupa array.',
        ]);

        // Ubah format input tanggal ke format Carbon
        $formattedDate = Carbon::parse($request->date_booking)->format('d-m-Y');
        $validated['date_booking'] = $formattedDate;
        $tanggalMulaiMember = Carbon::createFromFormat('d-m-Y', $validated['date_booking']); // Format input DD-MM-YYYY
        $hariIni = Carbon::today();

        // Validasi tanggal tidak boleh lebih kecil dari hari ini
        if ($tanggalMulaiMember->lessThan($hariIni)) {
            return redirect()->back()->withErrors(['date_booking' => 'Tanggal pemesanan harus hari ini atau yang akan datang.'])->withInput();
        }

        // Proses booking untuk member
        if ($request->member_booking) {
            if (count($request->time_booking) > 1) {
                foreach ($validated["time_booking"] as $time) {
                    for ($i = 0; $i < 4; $i++) {
                        $exists = Booking::where('date_booking', $tanggalMulaiMember->copy()->addWeeks($i)->format('d-m-Y'))
                            ->where("court_booking", $validated['court_booking'])
                            ->where("time_booking", $validated["time_booking"][0])
                            ->first();

                        if ($exists != null) {
                            return back()->with("alert", "Tanggal $exists->date_booking sudah dibooking sebelumnya, hapus data yang sudah tersedia atau pilih tanggal lain.")->withInput();
                        }

                        $bookingsToCreate[] = [
                            'name_booking' => $validated['name_booking'],
                            'date_booking' => $tanggalMulaiMember->copy()->addWeeks($i)->format('d-m-Y'),
                            'court_booking' => $validated['court_booking'],
                            'time_booking' => $time,
                        ];
                    }
                }
                Booking::create($bookingsToCreate);
            } else {
                for ($i = 0; $i < 4; $i++) {
                    $exists = Booking::where('date_booking', $tanggalMulaiMember->copy()->addWeeks($i)->format('d-m-Y'))
                        ->where("court_booking", $validated['court_booking'])
                        ->where("time_booking", $validated["time_booking"][0])
                        ->first();

                    if ($exists != null) {
                        return back()->with("alert", "Tanggal $exists->date_booking sudah dibooking sebelumnya, hapus data yang sudah tersedia atau pilih tanggal lain.")->withInput();
                    }

                    Booking::create([
                        'name_booking' => $validated['name_booking'],
                        'date_booking' => $tanggalMulaiMember->copy()->addWeeks($i)->format('d-m-Y'),
                        'court_booking' => $validated['court_booking'],
                        'time_booking' => $validated["time_booking"][0],
                    ]);
                }
            }
        } else {
            // Non-member
            $validated['date_booking'] = $tanggalMulaiMember->format('d-m-Y');
            if (count($request->time_booking) > 1) {
                foreach ($validated["time_booking"] as $time) {
                    Booking::create([
                        'name_booking' => $validated['name_booking'],
                        'date_booking' => $validated['date_booking'],
                        'court_booking' => $validated['court_booking'],
                        'time_booking' => $time,
                    ]);
                }
            } else {
                Booking::create([
                    'name_booking' => $validated['name_booking'],
                    'date_booking' => $validated['date_booking'],
                    'court_booking' => $validated['court_booking'],
                    'time_booking' => $validated['time_booking'][0],
                ]);
            }
        }

        return redirect('/admin/booking')->with('alert', 'Pesanan berhasil dibuat.');
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
        $data["title"] = "Edit Booking";
        $data["courts"] = Court::all();
        $data["booking"] = $booking;
        $operational = Operational::get()->first();
        $partsTimeOpen = explode(':', $operational->time_open);
        $partsTimeClose = explode(':', $operational->time_close);
        $data["incrementOpen"] = (int)$partsTimeOpen[0];
        $data["incrementClose"] = (int)$partsTimeClose[0] == 0 ? 24 : (int)$partsTimeClose[0];


        return view("admin.booking.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'name_booking' => 'required|string|min:3',
            'date_booking' => 'required',
            'court_booking' => 'required|string',
            'time_booking' => 'required|array',
        ], [
            'name_booking.required' => 'Nama pemesanan wajib diisi.',
            'name_booking.string' => 'Nama pemesanan harus berupa teks.',
            'name_booking.min' => 'Nama pemesanan harus terdiri dari minimal 3 karakter.',
            'date_booking.required' => 'Silakan isi tanggal untuk pemesanan.',
            'court_booking.required' => 'Silakan pilih lapangan untuk pemesanan.',
            'court_booking.string' => 'Nama lapangan harus berupa teks.',
            'time_booking.required' => 'Silakan pilih minimal satu slot waktu untuk pemesanan.',
            'time_booking.array' => 'Slot waktu harus berupa array.',
        ]);

        $booking->update($validated);

        return redirect('/admin/booking')->with('alert', 'Pesanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->update(["status_delete_booking" => 2]);
        $booking->delete();

        return redirect('/admin/booking')->with('alert', 'Booking berhasil dihapus.');
    }

    public function cekSlot(Request $request)
    {
        $formattedDate = Carbon::parse($request->date_booking)->format('d-m-Y');

        $bookings = Booking::where("court_booking", $request->court_booking)->where("date_booking", $formattedDate)->get();
        $dataBookings = $bookings->pluck('time_booking')->toArray();
        $data = [
            'response' => 200,
            "data" => [
                $dataBookings
            ]
        ];

        return response()->json($data);
    }

    public function search($name)
    {
        $bookings = Booking::where('name_booking', 'like', '%' . $name . '%')->take(5)->get();
        $bookingsData = [];
        foreach ($bookings as $booking => $value) {
            $bookingsData[$booking] = [
                'name_booking' => $value->name_booking,
                'court_booking' => $value->court_booking,
                'date_booking' => $value->date_booking,
                'time_booking' => $value->time_booking,
            ];
        }
        $data = [
            'response' => 200,
            'bookings' => $bookingsData
        ];

        return response()->json($data);
    }

    public function modalInfo(Request $request)
    {
        $partsDate = explode(" ", $request->date);
        $tanggalQuery = Carbon::createFromFormat('d/m/y', $partsDate[1])->format('d-m-Y');
        $result = Booking::where('time_booking', $request->time)->where('date_booking', $tanggalQuery)->get();

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
}
