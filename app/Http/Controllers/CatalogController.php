<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;

class CatalogController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::all();
        return view('catalogs.index', compact('catalogs'));
    }

    public function create()
{
    return view('catalogs.create');
}

    public function store(Request $request)
    {
        $validated = $request->validate([
        'nama_jasa_cuci' => 'required',
        'harga' => 'required|numeric',
        'deskripsi' => 'required',
        'gambar' => 'required|image|max:2048',
    ]);

    // Simpan gambar
    $path = $request->file('gambar')->store('catalogs', 'public');

    // Simpan ke database
    \App\Models\Catalog::create([
        'nama_jasa_cuci' => $validated['nama_jasa_cuci'],
        'harga' => $validated['harga'],
        'deskripsi' => $validated['deskripsi'],
        'gambar' => $path,
    ]);

    return redirect()->route('catalogs.index')->with('success', 'Katalog berhasil ditambahkan.');
    }

    public function edit($id)
{
    $catalog = \App\Models\Catalog::findOrFail($id);
    return view('catalogs.edit', compact('catalog'));
}

    public function update(Request $request, $id)
    {
    $catalog = \App\Models\Catalog::findOrFail($id);

    $validated = $request->validate([
        'nama_jasa_cuci' => 'required',
        'harga' => 'required|numeric',
        'deskripsi' => 'required',
        'gambar' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('catalogs', 'public');
        $validated['gambar'] = $path;
    }

    $catalog->update($validated);

    return redirect()->route('catalogs.index')->with('success', 'Katalog berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $catalog = Catalog::findOrFail($id);
        $catalog->delete();

        return redirect()->route('catalogs.index')->with('success', 'Katalog berhasil dihapus.');
    }

    public function show($id)
    {
        $catalog = Catalog::findOrFail($id);
        return view('catalogs.show', compact('catalog'));
    }
}
