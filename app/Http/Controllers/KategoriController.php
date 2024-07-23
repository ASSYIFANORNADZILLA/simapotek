<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $kategoris = Kategori::all();

        $search = $request->get('search');

        if ($search) {
            $kategoris = Kategori::where('nama_kategori', 'like', "%{$search}%")
                ->get();
        } else {
            $kategoris = Kategori::all();
        }
        return view('kategoris.list', compact('kategoris'));
    }

    public function createKategori()
    {
        return view('kategoris.form');
    }

    public function insertKategori(Request $request)
    {
        $request->validate([
            'kode_kategori' => 'required|unique:kategoris,kode_kategori',
            'nama_kategori' => 'required',
        ]);

        $kategori = new Kategori();
        $kategori->kode_kategori = $request->kode_kategori;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return redirect('/kategori');
    }

    public function showFormUpdate($kategori_id)
    {
        $kategori = Kategori::find($kategori_id);
        return view('kategoris.edit', compact('kategori'));
    }

    public function updateKategori(Request $request, $kategori_id)
    {
        $request->validate([
            'kode_kategori' => 'required|unique:kategoris,kode_kategori,' . $kategori_id . ',kode_kategori',
            'nama_kategori' => 'required',
        ]);

        $kategori = Kategori::find($kategori_id);

        // Delete the old record
        $kategori->delete();

        // Create a new record with updated values
        $newKategori = new Kategori();
        $newKategori->kode_kategori = $request->kode_kategori;
        $newKategori->nama_kategori = $request->nama_kategori;
        $newKategori->save();

        return redirect('/kategori');
    }

    public function deleteKategori($kategori_id)
    {
        Kategori::where('kode_kategori', $kategori_id)->delete();
        return redirect('/kategori')->with('success', 'Kategori berhasil dihapus.');
    }
}
