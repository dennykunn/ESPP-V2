<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataPembayaranController extends Controller
{
    public function index()
    {
        return view('data-pembayaran');
    }
}
