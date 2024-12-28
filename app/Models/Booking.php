<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ["name_booking", "date_booking", "court_booking", "price_booking", "time_booking", "status_delete_booking"];
    protected $primaryKey = 'id_booking';
}
