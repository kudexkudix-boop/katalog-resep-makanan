<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    // Menampilkan semua resep
    public function index()
    {
        $reseps = Resep::latest()->get();

        return view('resep.index', compact('reseps'));
    }

    // Menampilkan form tambah resep
    public function create()
    {
        return view('resep.create');
    }

    // Menyimpan resep baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_resep' => 'required|max:255',
            'deskripsi' => 'required',
            'bahan' => 'required',
            'langkah' => 'required',
            'waktu_memasak' => 'required|integer|min:1',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')
                ->store('resep', 'public');
        }

        Resep::create($validated);

        return redirect()->route('resep.index')
            ->with('success', 'Resep berhasil ditambahkan!');
    }

    // Menampilkan detail resep
    public function show(Resep $resep)
    {
        return view('resep.show', compact('resep'));
    }

    // Menampilkan form edit resep
    public function edit(Resep $resep)
    {
        return view('resep.edit', compact('resep'));
    }

    // Memperbarui resep
    public function update(Request $request, Resep $resep)
    {
        $validated = $request->validate([
            'nama_resep' => 'required|max:255',
            'deskripsi' => 'required',
            'bahan' => 'required',
            'langkah' => 'required',
            'waktu_memasak' => 'required|integer|min:1',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($resep->gambar) {
                \Illuminate\Support\Facades\Storage::disk('public')
                    ->delete($resep->gambar);
            }

            $validated['gambar'] = $request->file('gambar')
                ->store('resep', 'public');
        }

        $resep->update($validated);

        return redirect()->route('resep.index')
            ->with('success', 'Resep berhasil diperbarui!');
    }

    // Menghapus resep
    public function destroy(Resep $resep)
    {
        if ($resep->gambar) {
            \Illuminate\Support\Facades\Storage::disk('public')
                ->delete($resep->gambar);
        }

        $resep->delete();

        return redirect()->route('resep.index')
            ->with('success', 'Resep berhasil dihapus!');
    }
}