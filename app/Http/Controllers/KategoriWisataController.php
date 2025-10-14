<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriWisata;

class KategoriWisataController extends Controller
{
    public function index()
    {
        $kategori = KategoriWisata::all();
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
        ]);

        KategoriWisata::create($request->all());
        return redirect()->route('kategori-wisata.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit(KategoriWisata $kategori_wisatum)
    {
        return view('kategori_wisata.edit', compact('kategori_wisatum'));
    }

    public function update(Request $request, KategoriWisata $kategori_wisatum)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
        ]);

        $kategori_wisatum->update($request->all());
        return redirect()->route('kategori-wisata.index')->with('success', 'Kategori berhasil diupdate');
    }

    public function destroy(KategoriWisata $kategori_wisatum)
    {
        $kategori_wisatum->delete();
        return redirect()->route('kategori-wisata.index')->with('success', 'Kategori berhasil dihapus');
    }
}
