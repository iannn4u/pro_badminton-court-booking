<?php

namespace App\Http\Controllers;

use App\Models\Operational;
use App\Http\Requests\StoreOperationalRequest;
use App\Http\Requests\UpdateOperationalRequest;
use Illuminate\Http\Request;

class OperationalController extends Controller
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
