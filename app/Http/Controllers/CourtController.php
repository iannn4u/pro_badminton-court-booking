<?php

namespace App\Http\Controllers;

use App\Models\Court;
use App\Http\Requests\StoreCourtRequest;
use App\Http\Requests\UpdateCourtRequest;
use Illuminate\Http\Request;

class CourtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["title"] = "Lapangan";
        $data["courts"] = Court::all();

        return view("admin.court.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data["title"] = "Tambah Lapangan";
        
        return view("admin.court.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_court' => 'required|string',
        ]);
    
        Court::create($validated);
    
        return redirect('/admin/lapangan')->with('alert', 'Lapangan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Court $court)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_court)
    {
        $data["title"] = "Edit Lapangan";
        $data["court"] = Court::where("id_court", $id_court)->first();
        
        return view("admin.court.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_court)
    {
        $court = Court::where("id_court", $id_court)->first();
        $validated = $request->validate([
            'name_court' => 'required|string',
        ]);
    
        $court->update($validated);
    
        return redirect('/admin/lapangan')->with('alert', 'Lapangan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_court)
    {
        $court = Court::where("id_court", $id_court)->first();
        $court->delete();

        return redirect('/admin/lapangan')->with('alert', 'Lapangan berhasil dihapus.');
    }
}
