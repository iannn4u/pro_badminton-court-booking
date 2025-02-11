<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Court;
use App\Models\Operational;
use App\Models\Pelanggan;
use App\Models\Report;
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
        $sortBy = $request->input('sort_by', 'date_booking');
        $sortOrder = $request->input('sort_order', 'asc');

        $data["bookings"] = Booking::when($search, function ($query, $search) {
            $query->where('name_booking', 'like', "%$search%")
                ->orWhere('date_booking', 'like', "%$search%")
                ->orWhere('court_booking', 'like', "%$search%");
        })
            ->orderBy($sortBy, $sortOrder)
            ->get();

        return view("admin.booking.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data["title"] = "Tambah Booking";
        $data["courts"] = Court::all();
        $data['pelanggans'] = Pelanggan::all();
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

        $court = Court::where("name_court", $request->court_booking)->first();
        $pelanggan = Pelanggan::where("id", $request->id_pelanggan)->first();

        // Ubah format input tanggal ke format Carbon
        $dateParse = Carbon::parse($request->date_booking);
        $hariIni = Carbon::today();

        // Validasi tanggal tidak boleh lebih kecil dari hari ini
        if ($dateParse->lessThan($hariIni)) {
            return redirect()->back()->withErrors(['date_booking' => 'Tanggal pemesanan harus hari ini atau yang akan datang.'])->withInput();
        }

        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $report = Report::where('bulan', $currentMonth)
            ->where('tahun', $currentYear)
            ->first();

            
        if (!$report) {
            Report::create(["tahun" => $currentYear, "bulan" => $currentMonth]);
        }

        // Proses booking untuk member
        if ($request->member_booking) {
            if (count($request->time_booking) > 1) {
                if ($pelanggan == null) {
                    $pelanggan = Pelanggan::create([
                        'name' => $validated['name_booking'],
                        'phoneNumber' => $request->input('phoneNumber'),
                        'first_come' => $hariIni->format('Y-m-d'),
                        'last_booking' => $hariIni->format('Y-m-d')
                    ]);
                    
                    $report->update(["member" => $report->member + 1]);
                } else {
                    $dataPelangganUpdate = [
                        'last_booking' => $hariIni->format('Y-m-d'),
                        'phoneNumber' => $request->input('phoneNumber') ?? $pelanggan->phoneNumber
                    ];

                    $pelanggan->update($dataPelangganUpdate);
                }

                foreach ($validated["time_booking"] as $time) {
                    for ($i = 0; $i < 4; $i++) {
                        $exists = Booking::where('date_booking', $dateParse->copy()->addWeeks($i))
                            ->where("court_booking", $validated['court_booking'])
                            ->where("time_booking", $validated["time_booking"][0])
                            ->first();

                        if ($exists != null) {
                            return back()->with("alert", "Tanggal $exists->date_booking sudah dibooking sebelumnya, hapus data yang sudah tersedia atau pilih tanggal lain.")->withInput();
                        }

                        $bookingsToCreate[] = [
                            'id_pelanggan' => $pelanggan->id,
                            'name_booking' => $validated['name_booking'],
                            'date_booking' => $dateParse->copy()->addWeeks($i),
                            'court_booking' => $validated['court_booking'],
                            'price_booking' => $court->price_court,
                            'time_booking' => $time,
                            'name_made_booking' => auth()->user()->name
                        ];
                    }
                }

                Booking::insert($bookingsToCreate);
            } else {
                if ($pelanggan == null) {
                    $pelanggan = Pelanggan::create([
                        'name' => $validated['name_booking'],
                        'phoneNumber' => $request->input('phoneNumber'),
                        'first_come' => $hariIni->format('Y-m-d'),
                        'last_booking' => $hariIni->format('Y-m-d')
                    ]);

                    $report->update(["member" => $report->member + 1]);
                } else {
                    $dataPelangganUpdate = [
                        'last_booking' => $hariIni->format('Y-m-d'),
                        'phoneNumber' => $request->input('phoneNumber') ?? $pelanggan->phoneNumber
                    ];

                    $pelanggan->update($dataPelangganUpdate);
                }

                for ($i = 0; $i < 4; $i++) {
                    $exists = Booking::where('date_booking', $dateParse->copy()->addWeeks($i))
                        ->where("court_booking", $validated['court_booking'])
                        ->where("time_booking", $validated["time_booking"][0])
                        ->first();

                    if ($exists != null) {
                        return back()->with("alert", "Tanggal $exists->date_booking sudah dibooking sebelumnya, hapus data yang sudah tersedia atau pilih tanggal lain.")->withInput();
                    }

                    Booking::create([
                        'id_pelanggan' => $pelanggan->id,
                        'name_booking' => $validated['name_booking'],
                        'date_booking' => $dateParse->copy()->addWeeks($i),
                        'court_booking' => $validated['court_booking'],
                        'time_booking' => $validated["time_booking"][0],
                        'price_booking' => $court->price_court,
                        'name_made_booking' => auth()->user()->name
                    ]);
                }
            }
        } else {
            if (count($request->time_booking) > 1) {
                // Masukkin data ke table pelanggan
                if ($pelanggan == null) {
                    foreach ($validated["time_booking"] as $time) {
                        Booking::create([
                            'id_pelanggan' => null,
                            'name_booking' => $validated['name_booking'],
                            'date_booking' => $validated['date_booking'],
                            'court_booking' => $validated['court_booking'],
                            'time_booking' => $time,
                            'price_booking' => $court->price_court,
                            'name_made_booking' => auth()->user()->name
                        ]);
                    }
                } else {
                    foreach ($validated["time_booking"] as $time) {
                        Booking::create([
                            'id_pelanggan' => $pelanggan->id,
                            'name_booking' => $validated['name_booking'],
                            'date_booking' => $validated['date_booking'],
                            'court_booking' => $validated['court_booking'],
                            'time_booking' => $time,
                            'price_booking' => $court->price_court,
                            'name_made_booking' => auth()->user()->name
                        ]);
                    }

                    $dataPelangganUpdate = [
                        'last_booking' => $hariIni->format('Y-m-d'),
                        'phoneNumber' => $request->input('phoneNumber') ?? $pelanggan->phoneNumber
                    ];

                    $pelanggan->update($dataPelangganUpdate);
                }
            } else {
                if ($pelanggan == null) {
                    Booking::create([
                        'id_pelanggan' => null,
                        'name_booking' => $validated['name_booking'],
                        'date_booking' => $validated['date_booking'],
                        'court_booking' => $validated['court_booking'],
                        'time_booking' => $validated['time_booking'][0],
                        'price_booking' => $court->price_court,
                        'name_made_booking' => auth()->user()->name
                    ]);
                } else {
                    Booking::create([
                        'id_pelanggan' => $pelanggan->id,
                        'name_booking' => $validated['name_booking'],
                        'date_booking' => $validated['date_booking'],
                        'court_booking' => $validated['court_booking'],
                        'time_booking' => $validated['time_booking'][0],
                        'price_booking' => $court->price_court,
                        'name_made_booking' => auth()->user()->name
                    ]);

                    $dataPelangganUpdate = [
                        'last_booking' => $hariIni->format('Y-m-d'),
                        'phoneNumber' => $request->input('phoneNumber') ?? $pelanggan->phoneNumber
                    ];

                    $pelanggan->update($dataPelangganUpdate);
                }
            }
        }

        return redirect('/admin/booking')->with('alert', 'Pesanan berhasil dibuat.');
    }



    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        $data["title"] = "Booking";
        $data["booking"] = $booking;

        return view("admin.booking.detail", $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $data["title"] = "Edit Booking";
        $data['pelanggans'] = Pelanggan::all();
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
            'date_booking' => 'required',
            'court_booking' => 'required|string',
            'time_booking' => 'required',
        ], [
            'date_booking.required' => 'Silakan isi tanggal untuk pemesanan.',
            'court_booking.required' => 'Silakan pilih lapangan untuk pemesanan.',
            'court_booking.string' => 'Nama lapangan harus berupa teks.',
            'time_booking.required' => 'Silakan pilih minimal satu slot waktu untuk pemesanan.',
        ]);

        $dateParse = Carbon::parse($validated["date_booking"]);
        $lastBookingDate = Carbon::parse($booking->pelanggan->last_booking);
        $hariIni = Carbon::today();

        if ($lastBookingDate->lessThan($hariIni)) {
            $dataPelanggans = Pelanggan::where('id', $booking->pelanggan->id)->get();
            if (count($dataPelanggans) == 1) {
                $booking->pelanggan->update(['last_booking' => $hariIni->format('Y-m-d'), 'first_come' => $hariIni->format('Y-m-d')]);
            } else {
                $booking->pelanggan->update(['last_booking' => $dateParse->format('Y-m-d')]);
            }
        }

        $court = Court::where("name_court", $request->court_booking)->first();
        $validated["price_booking"] = $court->price_court;
        $booking->update($validated);

        return redirect('/admin/booking')->with('alert', 'Pesanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $report = Report::where('bulan', $currentMonth)
            ->where('tahun', $currentYear)
            ->get();

        
        $pelanggan = Pelanggan::where("name", $booking->name_booking)->first();
        $pelanggan->update(['playing' => $pelanggan->playing - 1]);

        if ($pelanggan->playing == 0) {
            $pelanggan->delete();
        }

        $booking->forceDelete();

        return redirect('/admin/booking')->with('alert', 'Booking berhasil dihapus.');
    }

    public function cekSlot(Request $request)
    {
        $formattedDate = Carbon::parse($request->date_booking)->format('Y-m-d');

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
        $tanggalQuery = Carbon::createFromFormat('d/m/y', $partsDate[1])->format('Y-m-d');
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
