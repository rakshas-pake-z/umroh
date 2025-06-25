<?php

namespace App\Http\Controllers;

use App\Models\FormUmroh;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormUmrohController extends Controller
{
    // READ - Tampilkan semua data
    public function index()
    {
        $umroh = FormUmroh::with('Paket')->get();
        return view('umroh.index', ['data' => $umroh]);
    }

    // CREATE - Tampilkan form
    public function create()
    {
        $paket = Paket::all();
        return view('umroh.store', ['paket' => $paket]);
    }

    // STORE - Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'selection' => 'required',
            'paket_id' => 'required|exists:paket,id',
            'tgl_daftar' => 'required|date',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'email' => 'required|email',
            'no_hp' => 'required|string',
            'tgl_berangkat' => 'required|date',
            'room' => 'required|string',
            'jml_jamaah' => 'required|numeric',
            'keterangan' => 'nullable|string'
        ]);

        $validated['keterangan'] = $validated['keterangan'] ?? '-';

        FormUmroh::create($validated);

        return redirect()->route('umroh.index')->with('success', 'Data berhasil ditambahkan');
    }

    // SHOW - Tampilkan detail data
    public function show(string $id)
    {
        $data = FormUmroh::with('paket')->findOrFail($id);
        return view('umroh.show', compact('data'));
    }

    // EDIT - Tampilkan form edit
    public function edit(string $id)
    {
        $data = FormUmroh::with('Paket')->findOrFail($id);
        $paket = Paket::all();
        return view('umroh.edit', compact('data', 'paket'));
    }

    // UPDATE - Simpan perubahan
    public function update(Request $request, string $id)
    {
        $data = FormUmroh::findOrFail($id);
        
        $request->validate([
            'paket_id' => 'required|exists:paket,id',
            'tgl_daftar' => 'required|date',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'email' => 'required|email',
            'no_hp' => 'required|string',
            'tgl_berangkat' => 'required|date',
            'room' => 'required|string',
            'jml_jamaah' => 'required|numeric',
            'keterangan' => 'nullable|string'
        ]);

        $data->update($request->only([
            'tgl_daftar',
            'paket_id',
            'nama',
            'alamat',
            'email',
            'no_hp',
            'tgl_berangkat',
            'jml_jamaah',
            'keterangan',
            'room'
        ]));


        return redirect()->route('umroh.index')->with('success', 'Data berhasil diupdate');
    }

    // DELETE - Hapus data
    public function destroy(string $id)
    {
        $data = FormUmroh::findOrFail($id);
        $data->delete();

        return redirect()->route('umroh.index')->with('success', 'Data berhasil dihapus');
    }
}
