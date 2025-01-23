<?php

namespace App\Http\Controllers\ManajemenData;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\TahunAkademik;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        $tahunakademiks = TahunAkademik::all();
        return view('manajemen-data.kelas', compact('kelas', 'tahunakademiks'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode'   => 'required',
            'tahunakademik_id'   => 'required',
        ]);

        $kelas = new Kelas();
        $kelas->kode = $request->kode;
        $kelas->tahunakademik_id = $request->tahunakademik_id;
        $kelas->save();

        return redirect()->route('kelas.index')->with('success', 'Data user berhasil ditambah.');;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode'   => 'required',
            'tahunakademik_id'   => 'required',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->kode = $request->kode;
        $kelas->tahunakademik_id = $request->tahunakademik_id;
        $kelas->save();

        return redirect()->route('kelas.index')->with('success', 'Data user berhasil diedit.');
    }
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Data user berhasil dihapus.');
    }
}
