<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jangkrik extends Model
{
    protected $table = "jangkrik";

    protected $fillable = [
      'tahapan_panen',
    	'waktu',
        'hasil_panen',	
        'modal',	
        'laba',	
        'keterangan',
    ];

}
