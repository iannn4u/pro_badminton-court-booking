<?php

namespace App\Http\Controllers;

use App\Models\Operational;
use App\Http\Requests\StoreOperationalRequest;
use App\Models\Highlight;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OperationalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["title"] = "Setting";
        $data["operational"] = Operational::first();
        $data["highlights"] = Highlight::all();
        $operational = Operational::first();
        $data["photos_preview"] = [];
        if (!empty($operational->photos_place)) {
            $existingPhotos = json_decode($operational->photos_place, true);

            foreach ($existingPhotos as $photo) {
                $data["photos_preview"][] = $photo;
            }
        }


        return view("admin.operational.index", $data);
    }

    public function editAccount()
    {
        $data["title"] = "Edit Account";
        $data["user"] = User::first();

        return view("admin.operational.editAuth", $data);
    }

    public function updateAccount(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => 'required|string|min:3',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.string' => 'Username harus berupa teks.',
            'username.min' => 'Username harus terdiri dari minimal 3 karakter.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $user->update($validated);

        return redirect('/admin/pengaturan')->with('alert', 'Data account berhasil diperbarui.');
    }

    public function editBiodata()
    {
        $data["title"] = "Edit Biodata";
        $data["operational"] = Operational::first();

        return view("admin.operational.editBiodata", $data);
    }

    public function updateBiodata(Request $request, Operational $operational)
    {
        $validated = $request->validate([
            "name_biodata" => "required",
            "address_biodata" => "required",
            "link_address_biodata" => "required",
            "wa_biodata" => "required",
            "photos_place" => "array",
            "link_wa_biodata" => "required",
            "preview1" => "nullable",
            "preview2" => "nullable"
        ], [
            'username.required' => 'Nama tempat wajib diisi.',
            'address_biodata.required' => 'Alamat tempat wajib diisi.',
            'link_address_biodata.required' => 'Link google maps wajib diisi.',
            'wa_biodata.required' => 'No Telepon/Whatsapp wajib diisi.',
            'link_wa_biodata.required' => 'Link No Telepon/Whatsapp wajib diisi.',
        ]);

        $validated["preview1"] = $request->input('preview1') ? 1 : 0;
        $validated["preview2"] = $request->input('preview2') ? 1 : 0;

        $photos = [];
        if ($request->file('photos_place')) {
            if (!empty($operational->photos_place)) {
                $existingPhotos = json_decode($operational->photos_place, true);

                foreach ($existingPhotos as $photo) {
                    Storage::delete($photo);
                }
            }
            foreach ($request->file('photos_place') as $file) {
                $photos[] = $file->store('preview');
            }
            $validated["photos_place"] = json_encode($photos);
        } else {
            $validated["photos_place"] = $operational->photos_place;
        }


        $operational->update($validated);

        return redirect('/admin/pengaturan')->with('alert', 'Data account berhasil diperbarui.');
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
    public function store(StoreOperationalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Operational $operational)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Operational $operational)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Operational $operational)
    {
        $validated = $request->validate([
            'time_open' => 'required|string',
            'time_close' => 'required|string',
        ]);

        $operational->update($validated);

        return redirect('/admin/dashboard')->with('alert', 'Waktu buka dan tutup berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operational $operational)
    {
        //
    }
}
