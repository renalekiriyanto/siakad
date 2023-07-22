<?php

namespace App\Http\Controllers;

use App\Models\JadwalMapel;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Rules\HariRule;
use Illuminate\Http\Request;

class JadwalMapelController extends Controller
{
    public function index()
    {
        $list_jadwal = JadwalMapel::paginate(20);
        return view('jadwal_mapel.index', compact('list_jadwal'));
    }

    public function show(JadwalMapel $jadwalmapel)
    {
        return view('jadwal_mapel.show', compact('jadwalmapel'));
    }

    public function create()
    {
        $list_kelas = Kelas::paginate(10);
        $list_mapel = Mapel::paginate(10);
        return view('jadwal_mapel.create', compact('list_kelas', 'list_mapel'));
    }

    public function store(Request $request)
    {
        $data_valid = $request->validate([
            'id_mapel' => ['required'],
            'id_kelas' => ['required'],
            'hari' => ['required', 'string', 'max:255', new HariRule],
            'jam_mulai' => ['required', 'string', 'max:255'],
            'jam_berakhir' => ['required', 'string', 'max:255'],
        ]);

        $jadwalmapel = JadwalMapel::where('id_mapel', $request->id_mapel)->where('id_kelas', $request->id_kelas)->where('hari', $request->hari)->where('jam_mulai', $request->jam_mulai)->where('jam_berakhir', $request->jam_berakhir)->first();
        if ($jadwalmapel) {
            return redirect()->route('jadwalmapel')->with('warning', 'Data jadwal ini sudah ada.');
        }

        $jadwalmapel = JadwalMapel::create($data_valid);

        return redirect()->route('jadwalmapel')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(JadwalMapel $jadwalmapel)
    {
        $list_kelas = Kelas::paginate(10);
        $list_mapel = Mapel::paginate(10);
        return view('jadwal_mapel.edit', compact('jadwalmapel', 'list_kelas', 'list_mapel'));
    }

    public function update(Request $request, JadwalMapel $jadwalmapel)
    {
        $data_valid = $request->validate([
            'id_mapel' => ['required'],
            'id_kelas' => ['required'],
            'hari' => ['required', 'string', 'max:255', new HariRule],
            'jam_mulai' => ['required', 'string', 'max:255'],
            'jam_berakhir' => ['required', 'string', 'max:255'],
        ]);

        $jadwalmapel->update($data_valid);

        return redirect()->route('jadwalmapel')->with('success', 'Jadwal berhasil diupdate.');
    }

    public function destroy(JadwalMapel $jadwalmapel)
    {
        $jadwalmapel->delete();
        return redirect()->route('jadwalmapel')->with('success', 'Berhasil hapus jadwal.');
    }
}
