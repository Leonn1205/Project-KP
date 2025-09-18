<?php

namespace App\Http\Controllers;

use App\Models\TempatKuliner;
use App\Models\FotoKuliner;
use App\Models\JamOperasionalKuliner;
use Illuminate\Http\Request;

class TempatKulinerController extends Controller
{
    // GET /dashboard/kuliner
    public function index()
    {
        $kuliner = TempatKuliner::with(['foto','jamOperasional'])->get();
        return view('kuliner.index', compact('kuliner'));
    }

    // GET /dashboard/kuliner/create
    public function create()
    {
        return view('kuliner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'lokasi_lengkap' => 'required|string',
            'longitude' => 'nullable|numeric',
            'latitude' => 'nullable|numeric',
            'foto.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Ambil semua data form
        $data = $request->all();

        // Handle array/checkbox → simpan string/json
        $data['bahan_baku'] = $request->bahan_baku ? implode(',', $request->bahan_baku) : null;
        $data['profil_pelanggan'] = $request->profil_pelanggan ? implode(',', $request->profil_pelanggan) : null;
        $data['metode_transaksi'] = $request->metode_transaksi ? implode(',', $request->metode_transaksi) : null;

        $data['jenis_menu'] = $request->jenis_menu ? json_encode($request->jenis_menu) : null;
        $data['sertifikasi'] = $request->sertifikasi ? json_encode($request->sertifikasi) : null;
        $data['program_pemerintah'] = $request->program_pemerintah ? json_encode($request->program_pemerintah) : null;

        // Simpan data utama
        $kuliner = TempatKuliner::create($data);

        // Simpan foto
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                $path = $file->store('kuliner', 'public');
                FotoKuliner::create([
                    'id_kuliner' => $kuliner->id_kuliner,
                    'path_foto' => $path,
                ]);
            }
        }

        // Simpan jam operasional
        if ($request->jam_buka) {
            foreach ($request->jam_buka as $hari => $buka) {
                JamOperasionalKuliner::create([
                    'id_kuliner' => $kuliner->id_kuliner,
                    'hari' => $hari,
                    'jam_buka' => isset($request->libur[$hari]) ? null : $buka,
                    'jam_tutup' => isset($request->libur[$hari]) ? null : ($request->jam_tutup[$hari] ?? null),
                ]);
            }
        }

        return redirect()->route('kuliner.index')
            ->with('success','Tempat kuliner berhasil ditambahkan!');
    }

    // GET /dashboard/kuliner/{id}/edit
    public function edit($id)
    {
        $kuliner = TempatKuliner::with(['foto','jamOperasional'])->findOrFail($id);
        return view('kuliner.edit', compact('kuliner'));
    }

    public function update(Request $request, $id)
    {
        $kuliner = TempatKuliner::findOrFail($id);

        // Ambil semua data form
        $data = $request->all();

        // Handle array/checkbox → simpan string/json
        $data['bahan_baku'] = $request->bahan_baku ? implode(',', $request->bahan_baku) : null;
        $data['profil_pelanggan'] = $request->profil_pelanggan ? implode(',', $request->profil_pelanggan) : null;
        $data['metode_transaksi'] = $request->metode_transaksi ? implode(',', $request->metode_transaksi) : null;

        $data['jenis_menu'] = $request->jenis_menu ? json_encode($request->jenis_menu) : null;
        $data['sertifikasi'] = $request->sertifikasi ? json_encode($request->sertifikasi) : null;
        $data['program_pemerintah'] = $request->program_pemerintah ? json_encode($request->program_pemerintah) : null;

        // Update data utama
        $kuliner->update($data);

        // Simpan foto baru kalau ada
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                $path = $file->store('kuliner', 'public');
                FotoKuliner::create([
                    'id_kuliner' => $kuliner->id_kuliner,
                    'path_foto' => $path,
                ]);
            }
        }

        // Reset jam operasional lama
        $kuliner->jamOperasional()->delete();

        // Simpan jam operasional baru
        if ($request->jam_buka) {
            foreach ($request->jam_buka as $hari => $buka) {
                JamOperasionalKuliner::create([
                    'id_kuliner' => $kuliner->id_kuliner,
                    'hari' => $hari,
                    'jam_buka' => isset($request->libur[$hari]) ? null : $buka,
                    'jam_tutup' => isset($request->libur[$hari]) ? null : ($request->jam_tutup[$hari] ?? null),
                ]);
            }
        }

        return redirect()->route('kuliner.index')
            ->with('success','Data kuliner berhasil diperbarui!');
    }

    // DELETE /dashboard/kuliner/{id}
    public function destroy($id)
    {
        $kuliner = TempatKuliner::findOrFail($id);
        $kuliner->delete();

        return back()->with('success','Data kuliner berhasil dihapus!');
    }

    // GET /dashboard/kuliner/{id}
    public function show($id)
    {
        $kuliner = TempatKuliner::with(['foto','jamOperasional'])->findOrFail($id);
        return view('kuliner.show', compact('kuliner'));
    }

    // API JSON untuk peta
    public function api()
    {
        return response()->json(
            TempatKuliner::with(['foto','jamOperasional'])->get()
        );
    }
}
