<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paket = Paket::all();
        return view('paket.index', ['data' => $paket]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paket.store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'string|required',
            'harga' => 'integer|required',
            'by_airport' => 'integer|required'
        ]);

        // dd($validated);
        $paket = Paket::create($request->only(['nama', 'harga', 'by_airport']));
        // dd($paket);

        return redirect()->route('paket.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paket = Paket::findOrFail($id);

        return view('paket.edit', ['data' => $paket]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'string|required',
            'harga' => 'integer|required',
            'by_airport' => 'integer|required'
        ]);

        $paket = Paket::findOrFail($id);

        $paket->update($request->only(['nama', 'harga', 'by_airport']));

        return redirect()->route('paket.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paket = Paket::findOrFail($id);
        $name = $paket->name;

        $paket->delete();

        return redirect()->back()->with('message', 'paket berhasil dihapus');
    }
}
