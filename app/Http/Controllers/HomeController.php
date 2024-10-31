<?php

namespace App\Http\Controllers;

use App\Models\Court;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        Carbon::setLocale("id");
        $data['courts'] = Court::all();
        $data['date'] = [];
        $daysInIndonesian = [
            'Sun' => 'Min',
            'Mon' => 'Sen',
            'Tue' => 'Sel',
            'Wed' => 'Rab',
            'Thu' => 'Kam',
            'Fri' => 'Jum',
            'Sat' => 'Sab',
        ];
        
        for ($i = 0; $i < 7; $i++) {
            $date = Carbon::now()->addDays($i);
            $day = $daysInIndonesian[$date->format('D')];

            $data['date'][] = [
                'day' => $day,
                'date' => $date->format('j/n')
            ];
        }


        return view('index', $data);
    }
}
