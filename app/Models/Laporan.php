<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    /** @use HasFactory<\Database\Factories\LaporanFactory> */
    protected $fillable = ['date_booking', 'price_booking', 'price_booking'];
    public $primaryKey = 'id_laporan';

    use HasFactory;
}
