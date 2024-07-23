<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Obat;

class PenjualanController extends Controller
{
    public function index(Request $request)
    {
        $penjualans = Penjualan::with('obat')->get();

        $search = $request->get('search');

        if ($search) {
            $penjualans = Penjualan::where('nomor_faktur', 'like', "%{$search}%")
                                   ->orWhere('jumlah', 'like', "%{$search}%")
                                   ->orWhereHas('obat', function($query) use ($search) {
                                       $query->where('nama_obat', 'like', "%{$search}%");
                                   })
                                   ->get();
        } else {
            $penjualans = Penjualan::with('obat')->get();
        }

        return view('penjualan.index', compact('penjualans'));
    }

    public function create()
    {
        $obats = Obat::all();
        return view('penjualan.create', compact('obats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_faktur' => 'required|unique:penjualans',
            'kode_obat' => 'required|exists:obats,kode_obat',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:1',
        ]);

        Penjualan::create($request->all());

        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil ditambahkan');
    }

    public function edit(Penjualan $penjualan)
    {
        $obats = Obat::all();
        return view('penjualan.edit', compact('penjualan', 'obats'));
    }

    public function update(Request $request, Penjualan $penjualan)
    {
        $request->validate([
            'kode_obat' => 'required|exists:obats,kode_obat',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:1',
        ]);

        $penjualan->update($request->all());

        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil diperbarui');
    }

    public function destroy($nomor_faktur)
    {
        $penjualan = Penjualan::findOrFail($nomor_faktur);
        $penjualan->delete();

        return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil dihapus.');
    }
}
