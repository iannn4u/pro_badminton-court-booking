<?php

namespace App\Http\Controllers;

use App\Models\Court;
use App\Http\Requests\StoreCourtRequest;
use App\Http\Requests\UpdateCourtRequest;

class CourtController extends Controller
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
        return view('admin.court.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourtRequest $request)
    {
        $data = [
            'name_court' => $request->name_court,
            'price_court' => $request->price_court,
            'description' => $request->description
        ];
        Court::create($data);
        return redirect('/admin');
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
    public function edit(Court $court)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourtRequest $request, Court $court)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Court $court)
    {
        $court->delete();

        return redirect('/admin');
    }
}
