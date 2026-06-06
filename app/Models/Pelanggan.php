<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pelanggan';
    protected $guarded = ["id_pelanggan"];

    public function booking() {
        return $this->hasMany(Booking::class, 'id_pelanggan', 'id_pelanggan');
    }
}
