<?php

namespace App\Http\Controllers\ManajemenData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PembayaranPerbulanController extends Controller
{
    public function index()
    {
        return view('manajemen-data.pembayaran-perbulan');
    }
}
