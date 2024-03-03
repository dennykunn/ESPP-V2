<?php

namespace App\Http\Controllers\ManajemenData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        return view('manajemen-data.kelas');
    }
}
