<?php

namespace App\Http\Controllers;

use App\Models\Jangkrik;
use Illuminate\Http\Request;
use App\Models\RmJangkrik;

class RmJangkrikController extends Controller
{

    public function index()
    {
        $nan = rmjangkrik::all();
        return view('rm_jangkrik', compact('nan'));
    }

  
    public function create()
    {
        return view('tambah_rm_jangkrik');
    }

    
    public function store(Request $request)
    {
        rmJangkrik::create([
        'tanggal'=> $request ->tanggal,
        'telur'=> $request->telur,
    	'panen'=> $request ->panen,
        'omset'=> $request ->omset,	
        'pengeluaran'=> $request ->pengeluaran,	
        'keuntungan'=> $request ->keuntungan,
        ]);
        return redirect('rm_jangkrik')->with('success', 'Data Berhasil Ditambah');
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $nan = rmjangkrik::findOrFail($id);
        return view('rmj_edit', compact('nan'));
    }

    
    public function update(Request $request, $id)
    {
        $nan = rmjangkrik::findOrFail($id);
        $nan->update([
            'tanggal'=> $request ->tanggal,
            'telur'=> $request->telur,
    	    'panen'=> $request ->panen,
            'omset'=> $request ->omset,	
            'pengeluaran'=> $request ->pengeluaran,	
            'keuntungan'=> $request ->keuntungan,
        ]);
        return redirect()->route('rm_jangkrik.index')->with('success', 'Data Berhasil Edit');
    }

    
    public function destroy($id)
    {
        $nan = rmjangkrik::findOrFail($id);
        $nan ->delete();

        return redirect()->route('rm_jangkrik.index');
    }
}
