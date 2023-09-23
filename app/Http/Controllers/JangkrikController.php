<?php

namespace App\Http\Controllers;

use App\Models\Jangkrik;
use Illuminate\Http\Request;

class JangkrikController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->input('bulan');

        // Jika bulan dipilih, ambil data sesuai bulan.
        if ($bulan) {
            $nan = Jangkrik::whereMonth('waktu', date('m', strtotime($bulan)))
                ->whereYear('waktu', date('Y', strtotime($bulan)))
                ->get();
        } else {
            // Jika bulan tidak dipilih, ambil semua data.
            $nan = Jangkrik::all();
        }

        return view('jangkrik', compact('nan'));
    }

    public function create()
    {
        return view('tambah_jangkrik');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tahapan_panen' => 'required',
            'waktu' => 'required',
            'hasil_panen' => 'required',
            'modal' => 'required',
            'laba' => 'required',
            'keterangan' => 'required',
        ]);

        Jangkrik::create($validatedData);

        return redirect()->route('jangkrik.index')->with('success', 'Data berhasil disimpan!');
    }

    public function show($id)
    {
        // Implementasi tampilan detail data jika diperlukan.
    }

    public function edit($id)
    {
        $nan = Jangkrik::findOrFail($id);
        return view('jangkrik-edit', compact('nan'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tahapan_panen' => 'required',
            'waktu' => 'required',
            'hasil_panen' => 'required',
            'modal' => 'required',
            'laba' => 'required',
            'keterangan' => 'required',
        ]);

        $nan = Jangkrik::findOrFail($id);
        $nan->update($validatedData);

        return redirect()->route('jangkrik.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $jangkrik = Jangkrik::findOrFail($id);
        $jangkrik->delete();

        return redirect()->route('jangkrik.index')->with('success', 'Data berhasil dihapus!');
    }
}
