<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    use HasFactory;
    
    protected $guarded = ["id_court"];
    protected $primaryKey = 'id_court';
    
    public $timestamps = false;

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'id_court', 'id_court');
    }
}
