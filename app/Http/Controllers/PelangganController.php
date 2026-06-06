<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function searchPelanggan(Request $request)
    {
        $search = $request->input('search');

        $query = Pelanggan::where('status', 'aktif');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('id_pelanggan', 'like', "%{$search}%")
                    ->orWhere('phoneNumber', 'like', "%{$search}%");
            });
        }

        $pelanggans = $query->get();

        return response()->json($pelanggans, 200);
    }

    public function index(Request $request)
    {
        $data["title"] = "Pelanggan";
        $search = $request->input('search');

        $data["pelanggans"] = Pelanggan::when($search, function ($query, $search) {
            $query->where('name', 'like', "%$search%")
                ->orWhere('phoneNumber', 'like', "%$search%")
                ->orWhere('last_playing', 'like', "%$search%")
                ->orWhere('status', 'like', "%$search%")
                ->orWhere('alamat', 'like', "%$search%")
                ->orWhere('playing', 'like', "%$search%")
                ->orWhere('first_come', 'like', "%$search%");
        })->get();

        return view("admin.pelanggan.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePelangganRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        $data["title"] = "Detail Pelanggan";
        $data['pelanggan'] = $pelanggan;

        return view("admin.pelanggan.detail", $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        $data["title"] = "Edit Pelanggan";
        $data['pelanggan'] = $pelanggan;

        return view("admin.pelanggan.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'min:3',
                Rule::unique('pelanggans', 'name')->ignore($pelanggan->id_pelanggan),
            ],
            'phoneNumber' => 'numeric',
            'address' => 'nullable',
        ], [
            'name.required' => 'Nama pemesanan wajib diisi.',
            'name.string' => 'Nama pemesanan harus berupa teks.',
            'name.min' => 'Nama pemesanan harus terdiri dari minimal 3 karakter.',
            'name.unique' => 'Nama pemesanan sudah dipakai.',
            'phoneNumber.required' => 'Silakan isi no dengan angka.',
        ]);

        $pelanggan->booking()->update(['name_booking' => $validated['name']]);
        $pelanggan->update($validated);

        return redirect('/pelanggan')->with('alert', 'Pesanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $bookings = Booking::where('name_booking', $pelanggan->name,)->where("id_pelanggan", $pelanggan->id_pelanggan)->get();
        foreach ($bookings as $booking) {
            $booking->forceDelete();
        }
        $pelanggan->delete();

        return redirect('/pelanggan')->with('alert', 'Pelanggan berhasil dihapus.');
    }
}
