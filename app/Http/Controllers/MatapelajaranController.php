<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MatapelajaranController extends Controller
{
    public function index()
    {
        $list_mapel = Mapel::paginate(20);
        return view('mapel.index', compact('list_mapel'));
    }

    public function create()
    {
        return view('mapel.tambah');
    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'nama' => ['required', 'string', 'max:255']
        ]);

        $mapel = Mapel::where('nama', '%' . $request->nama . '%')->first();
        if ($mapel) {
            return redirect()->route('mapel')->with('warning', 'Data sudah ada.');
        }

        $mapel = Mapel::create($valid);

        return redirect()->route('mapel')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(Mapel $mapel)
    {
        return view('mapel.show', compact('mapel'));
    }

    public function edit(Mapel $mapel)
    {
        return view('mapel.edit', compact('mapel'));
    }

    public function update(Request $request, Mapel $mapel)
    {
        $valid = $request->validate([
            'nama' => ['required', 'string', 'max:255']
        ]);

        $mapel->update($valid);

        return redirect()->route('mapel')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(Mapel $mapel)
    {
        $mapel->delete();
        return redirect()->route('mapel')->with('success', 'Data berhasil dihapus.');
    }

    public function api_getdetail(Mapel $mapel)
    {
        return response()->json($mapel);
    }
}
