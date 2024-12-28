<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    public $primaryKey = "id_biodata";
    protected $fillable = ["id_biodata", "name_biodata", "address_biodata", "link_address_biodata", "wa_biodata", "link_wa_biodata", "link_wa_biodata"];
}
