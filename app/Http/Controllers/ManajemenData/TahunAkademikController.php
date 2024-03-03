<?php

namespace App\Http\Controllers\ManajemenData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TahunAkademikController extends Controller
{
    public function index()
    {
        return view('manajemen-data.tahun-akademik');
    }
}
