<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai; // model yang diimpor

class PegawaiController extends Controller
{
    public function getPegawai(Request $request) {
        $pegawai = Pegawai::all();

        $search = $request->get('search');

        if ($search) {
            $pegawai = Pegawai::where('nama', 'like', "%{$search}%")
                             ->orWhere('jenis_kelamin', 'like', "%{$search}%")
                             ->orWhere('alamat', 'like', "%{$search}%")
                             ->orWhere('no_hp', 'like', "%{$search}%")
                             ->orWhere('umur', 'like', "%{$search}%")
                             ->get();
        } else {
            $pegawai = Pegawai::all();
        }

        return view('pegawai.list')->with(compact('pegawai'));
    }

    

    public function createPegawai() {
        return view('pegawai.form');
    }

    public function insertPegawai(Request $request) {
        $pegawai = new Pegawai();

        $pegawai->nama = $request->nama;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->alamat = $request->alamat;
        $pegawai->no_hp = $request->no_hp;
        $pegawai->umur = $request->umur;

        $pegawai->save();

        return redirect('/pegawai');
    }

    public function showFormUpdate($pegawai_id) {
        $pegawai = Pegawai::find($pegawai_id);

        return view('pegawai.edit')->with(compact('pegawai'));
    }

    public function updatePegawai(Request $request, $pegawai_id) {
        $pegawai = Pegawai::find($pegawai_id);

        $pegawai->nama = $request->nama;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->alamat = $request->alamat;
        $pegawai->no_hp = $request->no_hp;
        $pegawai->umur = $request->umur;

        $pegawai->save();        

        return redirect('/pegawai');
    }

    public function deletePegawai($pegawai_id) {
        Pegawai::where('id',$pegawai_id)->delete();

        return redirect('/pegawai');
    }

    
    
}