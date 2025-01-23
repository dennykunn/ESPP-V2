<?php

namespace App\Http\Controllers\ManajemenData;

use App\Http\Controllers\Controller;
use App\Models\PembayaranPerbulan;
use Illuminate\Http\Request;

class PembayaranPerbulanController extends Controller
{
    public function index()
    {
        $pembayaranPerbulan = PembayaranPerbulan::all();
        return view('manajemen-data.pembayaran-perbulan', compact('pembayaranPerbulan'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'bulan'   => 'required',
            'tahun'   => 'required',
            'jumlah'   => 'required',
        ]);

        $pp = new PembayaranPerbulan();
        $pp->bulan = $request->bulan;
        $pp->tahun = $request->tahun;
        $pp->jumlah = $request->jumlah;
        $pp->save();

        return redirect()->route('pembayaran-perbulan.index')->with('success', 'Data pembayaran perbulan berhasil ditambah.');;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'bulan'   => 'required',
            'tahun'   => 'required',
            'jumlah'   => 'required',
        ]);

        $pp = PembayaranPerbulan::findOrFail($id);
        $pp->bulan = $request->bulan;
        $pp->tahun = $request->tahun;
        $pp->jumlah = $request->jumlah;
        $pp->save();

        return redirect()->route('pembayaran-perbulan.index')->with('success', 'Data pembayaran perbulan berhasil diedit.');
    }
    public function destroy($id)
    {
        $pp = PembayaranPerbulan::findOrFail($id);
        $pp->delete();

        return redirect()->route('pembayaran-perbulan.index')->with('success', 'Data pembayaran perbulan berhasil dihapus.');
    }
}
