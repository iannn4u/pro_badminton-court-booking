<?php

namespace App\Http\Controllers;

use App\Models\Court;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $data['courts'] = Court::all();
        
        return view('index', $data);
    }
}
