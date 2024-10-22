<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    protected $fillable = ['name_court', 'price_court', 'description'];
    public $primaryKey = 'id_court';
}
