<?php

namespace App\Http\Controllers\ManajemenData;

use App\Http\Controllers\Controller;
use App\Models\TahunAkademik;
use Illuminate\Http\Request;
use illuminate\Support\Facades\DB;

class TahunAkademikController extends Controller
{
    public function index()
    {
        $ta = TahunAkademik::all();
        return view('manajemen-data.tahun-akademik', compact('ta'));
    }
}
