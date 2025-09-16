<?php

namespace App\Http\Controllers;

use App\Models\TempatWisata;
use App\Models\FotoWisata;
use App\Models\JamOperasionalWisata;
use Illuminate\Http\Request;

class TempatWisataController extends Controller
{
    // Menampilkan daftar tempat wisata
    public function index()
    {
        $wisata = TempatWisata::with(['fotos','jamOperasional'])->get();
        return view('wisata.index', compact('wisata'));
    }

    // Form tambah data
    public function create()
    {
        return view('wisata.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'kategori_wisata' => 'required|string|max:100',
            'longitude' => 'nullable|numeric',
            'latitude' => 'nullable|numeric',
            'deskripsi' => 'nullable|string',
            'sejarah' => 'nullable|string',
            'narasi' => 'nullable|string',
            'foto.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan data utama
        $wisata = TempatWisata::create($request->only([
            'nama_wisata','kategori_wisata',
            'longitude','latitude',
            'deskripsi','sejarah','narasi'
        ]));

        // Simpan foto jika ada
        if($request->hasFile('foto')) {
            foreach($request->file('foto') as $file) {
                $path = $file->store('wisata','public');
                FotoWisata::create([
                    'id_wisata' => $wisata->id_wisata,
                    'path_foto' => $path,
                ]);
            }
        }

        // Simpan jam operasional (opsional)
        if($request->filled('hari')) {
            foreach($request->hari as $index => $hari) {
                JamOperasionalWisata::create([
                    'id_wisata' => $wisata->id_wisata,
                    'hari' => $hari,
                    'jam_buka' => $request->jam_buka[$index] ?? null,
                    'jam_tutup' => $request->jam_tutup[$index] ?? null,
                ]);
            }
        }

        return redirect()->route('wisata.index')
            ->with('success','Tempat wisata berhasil ditambahkan!');
    }

    // Edit
    public function edit($id)
    {
        $wisata = TempatWisata::with(['fotos','jamOperasional'])->findOrFail($id);
        return view('wisata.edit', compact('wisata'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $wisata = TempatWisata::findOrFail($id);

        $wisata->update($request->only([
            'nama_wisata','kategori_wisata',
            'longitude','latitude',
            'deskripsi','sejarah','narasi'
        ]));

        return redirect()->route('wisata.index')
            ->with('success','Data berhasil diperbarui!');
    }

    // Hapus
    public function destroy($id)
    {
        $wisata = TempatWisata::findOrFail($id);
        $wisata->delete();
        return back()->with('success','Data berhasil dihapus!');
    }

    public function api()
    {
        return response()->json(
            TempatWisata::with(['fotos', 'jamOperasional'])->get()
        );
    }

}
