<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operational extends Model
{
    protected $fillable = ['open', 'close'];
    public $primaryKey = 'id_operationals';
}
