<?php

namespace App\Http\Controllers;

use App\Models\FormUmroh;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormUmrohController extends Controller
{
    public function index()
    {
        $paket = Paket::all();
        return view('form', ['paket' => $paket]);
    }

    public function submitForm(Request $request)
    {
        $validated = $request->validate([
            'tgl_daftar'    => 'required|date',
            'nama'          => 'required|string',
            'alamat'        => 'required|string',
            'email'         => 'required|email',
            'no_hp'         => 'required|string',
            'tgl_berangkat' => 'required|date',
            'jml_jamaah'    => 'required|integer',
            'keterangan'    => 'nullable|string',
            'room'          => 'required|string',
            'paket_id'      => 'required|integer',
        ]);

        $validated['keterangan'] = $validated['keterangan'] ?? '-';

        FormUmroh::create($validated);

        return redirect()->back()->with('success', 'Form berhasil disimpan.');
    }
}
