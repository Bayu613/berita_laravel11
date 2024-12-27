<?php

namespace App\Http\Controllers;

use App\Models\Kontens;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Konten extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kontens = Kontens::latest('id')->paginate(10);
        $kategori = Kategori::latest('id')->get();
        return view('admin.konten', [
            'kontens' => $kontens,
            'kategori' => $kategori,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'kategori' => 'required|string',
            'slug' => 'nullable|string|regex:/^[a-z0-9-]+$/|unique:kontens,slug',
            'tanggal' => 'required|date',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        if (empty($validatedData['slug'])) {
            $validatedData['slug'] = str()->slug($validatedData['judul']); // Gunakan slug dari judul
        }

        // Pastikan slug unik
        $existingSlugCount = Kontens::where('slug', $validatedData['slug'])->count();
        if ($existingSlugCount > 0) {
            // Jika slug sudah ada, tambahkan angka di akhir untuk unik
            $validatedData['slug'] = $validatedData['slug'] . '-' . (Kontens::max('id') + 1);
        }

        $konten = Kontens::create($validatedData);

        if ($request->hasFile('foto')) {
            $fileName = $request->file('foto')->getClientOriginalName();
            $filePath = $request->file('foto')->storeAs('konten_foto', $fileName, 'public');
            $konten->foto = $fileName;
            $konten->save();
        }

        return redirect()->back()->with('success', 'Berhasil Menambahkan Konten!!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $detail = Kontens::where('slug', $slug)->firstOrFail(); // Fetch data based on slug

        return view('detail', compact('detail')); // Pass it to the view
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
