<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RmJangkrik;
use App\Models\omset;
use App\Models\pengeluaran;

class ChartController extends Controller
{
    //

    public function loadChartData()
{
    $omsets = RmJangkrik::select('omset')->pluck('omset');
    $pengeluarans = RmJangkrik::select('pengeluaran')->pluck('pengeluaran');
    $telurs = RmJangkrik::select('telur')->pluck('telur');
    $panens = RmJangkrik::select('panen')->pluck('panen');
    
    // Mencetak data untuk memeriksa
    // dd($omsets, $pengeluarans, $telurs, $panens);

    return view('home', ['omsets' => $omsets, 'pengeluarans' => $pengeluarans, 'telurs' => $telurs, 'panens' => $panens]);
}

    public function index()
    {
        $nan = RmJangkrik::all();
        return view('cetakchart', compact('nan'));
    }
    
}
