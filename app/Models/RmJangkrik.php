<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RmJangkrik extends Model
{
    protected $table = "rm_jangkrik";

    protected $fillable = [
      'tanggal',
      'telur',
    	'panen',
        'omset',	
        'pengeluaran',	
        'keuntungan',	
    ];
}
