<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Obat;
use App\Models\Pemasok;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pegawaiCount = Pegawai::count();
        $obatCount = Obat::count();
        $pemasokCount = Pemasok::count();
        $kategoriCount = Kategori::count();

        return view('dashboard', compact('pegawaiCount', 'obatCount', 'pemasokCount', 'kategoriCount'));
    }
}
