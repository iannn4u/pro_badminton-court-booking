<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Operational;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\CssSelector\Node\FunctionNode;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["title"] = "Dashboard";
        $data["operational"] =  Operational::get()->first();
        
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

    public function pageLogin()
    {
        return view("admin.masuk");
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username_email' => 'required',
            'password' => 'required',
        ]);

        if (($request->username_email == "admin" || $request->username_email == "admin@gmail.com") && $request->password == "admin1234") {
            // // Jika valid, buat sesi
            // FacadesSession::put('logged_in', true);
            // FacadesSession::put('user', 'admin');

            // // Cek apakah Remember Me dicentang
            // if ($request->has('remember')) {
            //     // Buat cookie untuk Remember Me
            //     Cookie::queue('remember_token', 'admin', 60 * 24 * 7); // 7 hari
            // }

            return redirect("/admin/dashboard");
        } else {
            return redirect()->back()->withErrors([
                'masuk' => 'Username/Email atau password tidak sesuai.',
            ])->withInput();
        }
    }

    public function booking() {}
}
