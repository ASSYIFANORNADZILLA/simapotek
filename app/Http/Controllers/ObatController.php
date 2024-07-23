<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Kategori;
use App\Models\Pemasok;

class ObatController extends Controller
{
    public function getObat(Request $request)
    {
        $obats = Obat::with(['kategori', 'pemasok'])->get();

        $search = $request->get('search');

        if ($search) {
            $obats = Obat::with(['kategori', 'pemasok'])
                ->where('nama_obat', 'like', "%{$search}%")
                ->orWhereHas('kategori', function ($query) use ($search) {
                    $query->where('nama_kategori', 'like', "%{$search}%");
                })
                ->orWhereHas('pemasok', function ($query) use ($search) {
                    $query->where('nama_pemasok', 'like', "%{$search}%");
                })
                ->get();
        } else {
            $obats = Obat::with(['kategori', 'pemasok'])->get();
        }
        
        return view('obat.list', compact('obats'));
    }

    public function createObat()
    {
        $kategoris = Kategori::all();
        $pemasoks = Pemasok::all();
        return view('obat.form', compact('kategoris', 'pemasoks'));
    }

    public function insertObat(Request $request)
    {
        $request->validate([
            'kode_obat' => 'required|unique:obats,kode_obat',
            'nama_obat' => 'required',
            'kode_kategori' => 'required',
            'supplier' => 'required',
            'stok' => 'required|integer',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'tanggal_expired' => 'required|date',
        ]);

        $obat = new Obat();
        $obat->kode_obat = $request->kode_obat;
        $obat->nama_obat = $request->nama_obat;
        $obat->kode_kategori = $request->kode_kategori;
        $obat->supplier = $request->supplier;
        $obat->stok = $request->stok;
        $obat->harga_beli = $request->harga_beli;
        $obat->harga_jual = $request->harga_jual;
        $obat->tanggal_expired = $request->tanggal_expired;
        $obat->save();

        return redirect()->route('obat')->with('success', 'Obat berhasil ditambahkan.');
    }

    public function showFormUpdate($obat_id)
    {
        $obat = Obat::where('kode_obat', $obat_id)->first();
        if (!$obat) {
            abort(404, 'Obat not found');
        }
        $kategoris = Kategori::all();
        $pemasoks = Pemasok::all();
        return view('obat.edit', compact('obat', 'kategoris', 'pemasoks'));
    }


    public function updateObat(Request $request, $obat_id)
    {
        $request->validate([
            'nama_obat' => 'required',
            'kode_kategori' => 'required',
            'supplier' => 'required',
            'stok' => 'required|integer',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'tanggal_expired' => 'required|date',
        ]);

        $obat = Obat::where('kode_obat', $obat_id)->first();

        if (!$obat) {
            return redirect()->route('obat')->with('error', 'Obat tidak ditemukan.');
        }

        $obat->update($request->only([
            'nama_obat',
            'kode_kategori',
            'supplier',
            'stok',
            'harga_beli',
            'harga_jual',
            'tanggal_expired'
        ]));

        return redirect()->route('obat')->with('success', 'Obat berhasil diperbarui.');
    }



    public function deleteObat($obat_id)
    {
        Obat::where('kode_obat', $obat_id)->delete();
        return redirect()->route('obat')->with('success', 'Obat berhasil dihapus.');
    }
}
