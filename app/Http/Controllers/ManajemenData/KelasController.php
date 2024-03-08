<?php

namespace App\Http\Controllers\ManajemenData;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('manajemen-data.kelas', compact('kelas'));
    }
}
