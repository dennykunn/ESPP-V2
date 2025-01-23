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

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode'   => 'required',
        ]);

        $tahunakademik = new TahunAkademik();
        $tahunakademik->kode = $request->kode;
        $tahunakademik->save();

        return redirect()->route('tahun-akademik.index')->with('success', 'Tahun Akademik berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode'   => 'required',
        ]);

        $tahunakademik = TahunAkademik::findOrFail($id);
        $tahunakademik->kode = $request->kode;
        $tahunakademik->save();

        return redirect()->route('tahun-akademik.index')->with('success', 'Tahun Akademik berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $tahunakademik = TahunAkademik::findOrFail($id);
        $tahunakademik->delete();

        return redirect()->route('tahun-akademik.index')->with('success', 'Data user berhasil dihapus.');
    }
}
