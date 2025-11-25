<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Department;
use App\Models\Position;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::with(['departemen', 'jabatan'])->get();
        return view('pegawai.index', compact('pegawais'));
    }

    public function create()
    {
        $departemen = Department::all();
        $jabatan = Position::all();
        return view('pegawai.create', compact('departemen', 'jabatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'departemen_id' => 'required',
            'jabatan_id' => 'required',
            'tanggal_masuk' => 'required|date',
            'gaji' => 'required|numeric',
        ]);

        Pegawai::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'departemen_id' => $request->departemen_id,
            'jabatan_id' => $request->jabatan_id,
            'tanggal_masuk' => $request->tanggal_masuk,
            'gaji' => $request->gaji,
        ]);

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil ditambahkan!');
    }

   public function edit($id)
{
    $pegawai = Pegawai::findOrFail($id);
    $departemen = Department::all();
    $jabatan = Position::all();

    return view('pegawai.edit', compact('pegawai', 'departemen', 'jabatan'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'nip' => 'required',
        'departemen_id' => 'required',
        'jabatan_id' => 'required',
        'tanggal_masuk' => 'required|date',
        'gaji' => 'required|numeric',
    ]);

    $pegawai = Pegawai::findOrFail($id);
    $pegawai->update($request->all());

    return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diperbarui!');
}


}
