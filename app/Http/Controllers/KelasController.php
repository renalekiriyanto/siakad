<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $list_kelas = Kelas::paginate(20);
        return view('kelas.index', compact('list_kelas'));
    }

    public function create()
    {
        return view('kelas.tambah');
    }

    public function store(Request $request)
    {
        $dataValid = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'tahun_ajaran' => ['required', 'string']
        ]);

        $kelas = Kelas::where('nama', '%' . $request->nama . '%')->where('tahun_ajaran', $request->tahun_ajaran)->first();
        if ($kelas) {
            return redirect()->route('kelas')->with('warning', 'Data sudah ada.');
        }

        $kelas = Kelas::create($dataValid);

        return redirect()->route('kelas')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Kelas $kelas)
    {
        return view('kelas.edit', compact('kelas'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        $dataValid = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'tahun_ajaran' => ['required', 'string']
        ]);

        $kelas->update($dataValid);

        return redirect()->route('kelas')->with('success', 'Data berhasil diupdate.');
    }

    public function show(Kelas $kelas)
    {
        return view('kelas.show', compact('kelas'));
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect()->route('kelas')->with('success', 'Data berhasil dihapus.');
    }
}
