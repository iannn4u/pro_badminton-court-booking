<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operational extends Model
{
    use HasFactory;
    
    protected $fillable = ["time_open", "time_close"];
    protected $primaryKey = 'id_operational';
    
    public $timestamps = false;    
}
