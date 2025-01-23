<?php

namespace App\Http\Controllers;

use App\Models\TahunAkademik;
use App\Models\User;
use Illuminate\Http\Request;

class DataPembayaranController extends Controller
{
    public function index()
    {
        $tahun = TahunAkademik::all();
        $siswa = User::where('role', 'murid')->get();
        return view('data-pembayaran', compact('tahun', 'siswa'));
    }
}
