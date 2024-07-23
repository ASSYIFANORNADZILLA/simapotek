<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasok;

class PemasokController extends Controller
{
    public function getPemasok(Request $request)
    {
        $pemasok = Pemasok::all();

        $search = $request->get('search');

    if ($search) {
        $pemasok = Pemasok::where('nama_pemasok', 'like', "%{$search}%")
                           ->orWhere('alamat', 'like', "%{$search}%")
                           ->orWhere('no_hp', 'like', "%{$search}%")
                           ->get();
    } else {
        $pemasok = Pemasok::all();
    }

    return view('pemasok.list', compact('pemasok'));
    }

    public function createPemasok()
    {
        return view('pemasok.form');
    }

    public function insertPemasok(Request $request)
    {
        $pemasok = new Pemasok();

        $pemasok->nama_pemasok = $request->nama_pemasok;
        $pemasok->alamat = $request->alamat;
        $pemasok->kota = $request->kota;
        $pemasok->no_hp = $request->no_hp;


        $pemasok->save();

        return redirect('/pemasok');
    }

    public function showFormUpdate($pemasok_id)
    {
        $pemasok = Pemasok::find($pemasok_id);
        return view('pemasok.edit')->with(compact('pemasok'));
    }

    public function updatePemasok(Request $request, $pemasok_id)
    {
        $request->validate([
            'nama_pemasok' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
        ]);

        $pemasok = Pemasok::find($pemasok_id);

        $pemasok->nama_pemasok = $request->nama_pemasok;
        $pemasok->alamat = $request->alamat;
        $pemasok->kota = $request->kota;
        $pemasok->no_hp = $request->no_hp;

        $pemasok->save();

        return redirect('/pemasok');
    }

    public function deletePemasok($pemasok_id)
    {
        Pemasok::where('id', $pemasok_id)->delete();

        return redirect('/pemasok');
    }
}
