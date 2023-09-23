<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jangkrik;
class CetakJangkrikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $bulan = $request->input('bulan');
    $query = Jangkrik::query();

    if ($bulan) {
        // Jika parameter bulan ada, filter data berdasarkan bulan
        $query->whereMonth('waktu', date('m', strtotime($bulan)))
              ->whereYear('waktu', date('Y', strtotime($bulan)));
    }

    $nan = $query->get();
    
    // Hitung totalPanen, totalModal, dan totalLaba di sini
    $totalPanen = 0;
    $totalModal = 0;
    $totalLaba = 0;

    foreach ($nan as $item) {
        $totalPanen += floatval(str_replace(['Rp ', '.'], '', $item->hasil_panen));
        $totalModal += floatval(str_replace(['Rp ', '.'], '', $item->modal));
        $totalLaba += floatval(str_replace(['Rp ', '.'], '', $item->laba));
    }

    return view('cetakjangkrik', compact('nan', 'totalPanen', 'totalModal', 'totalLaba'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

//     public function showJangkrikData()
// {
//     // ... your existing code to fetch $nan data and calculate $totalPanen, $totalModal, $totalLaba ...

//     return view('views.jangkrik', compact('nan', 'totalPanen', 'totalModal', 'totalLaba'));
// }
}
