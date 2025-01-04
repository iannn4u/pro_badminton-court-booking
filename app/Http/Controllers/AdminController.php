<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Booking;
use App\Models\Operational;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function admin()
    {
        return redirect('/admin/dashboard');
    }

    public function index()
    {
        $data["title"] = "Dashboard";
        $data["operational"] =  Operational::get()->first();
        $bookingsNotDelete = Booking::where('status_delete_booking', 0)->get();

        $bookingsSofDeleted = Booking::where('status_delete_booking', 1)->withTrashed()->get();
        $income = 0;
        foreach ($bookingsSofDeleted as $booking) {
            $partsDate = explode("-", $booking->date_booking);
            if (end($partsDate) == Carbon::now()->format("Y")) {
                $income += $booking->price_booking;
            }
        }
        foreach ($bookingsNotDelete as $booking) {
            $partsDate = explode("-", $booking->date_booking);
            if (end($partsDate) == Carbon::now()->format("Y")) {
                $income += $booking->price_booking;
            }
        }
        
        $data["income"] = $income;
        $data["visitor"] = Booking::where('date_booking', Carbon::now()->format("d-m-Y"))->where("status_delete_booking", [0, 1])->count();

        return view("admin.index",  $data);
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
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function viewLogin()
    {
        return view("admin.masuk");
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            "username" => "required",
            "password" => "required"
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->intended("/admin/dashboard");
        }

        return back()->with("masuk", "Username atau password tidak valid!");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
