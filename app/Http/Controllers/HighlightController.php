<?php

namespace App\Http\Controllers;

use App\Models\Highlight;
use App\Http\Requests\StoreHighlightRequest;
use App\Http\Requests\UpdateHighlightRequest;
use Illuminate\Http\Request;

class HighlightController extends Controller
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
        $data["title"] = "Tambah Highlight";

        return view("admin.operational.createHighlight", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_highlight' => 'required|string',
            'desc_highlight' => 'required|string',
        ]);

        Highlight::create($validated);

        return redirect('/admin/pengaturan')->with('alert', 'Highlight berhasil diperbarui.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Highlight $highlight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Highlight $highlight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHighlightRequest $request, Highlight $highlight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Highlight $highlight)
    {
        $highlight->delete();

        return redirect('/admin/pengaturan')->with('alert', 'Highlight berhasil dihapus.');
    }
}
