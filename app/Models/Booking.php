<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['name_booking', 'date_booking', 'time_booking', 'court_booking', 'method_payment', 'message_booking'];
    public $primaryKey = 'id_booking';
}
