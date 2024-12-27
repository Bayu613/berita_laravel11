<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Kontens;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kontensGrouped = Kontens::latest('id')->get()->groupBy('kategori');
        $kontens = Kontens::get()->shuffle();
        $latest = Kontens::latest('id')->get()->shuffle();
        $featured = Kontens::latest('id')->get();
        $featured = $featured->shuffle();
        $ekonomi = Kontens::where('kategori', 'ekonomi')->latest()->get(); // ambil konten dengan kategori "ekonomi"
        $teknologi = Kontens::where('kategori', 'teknologi')->latest()->get();
        $olahraga = Kontens::where('kategori', 'olahraga')->latest()->get();
        $politik = Kontens::where('kategori', 'politik')->latest()->get();
        $popular = Kontens::latest(column: 'id')->take(10)->get()->shuffle();
        $popular2 = Kontens::latest(column: 'id')->take(10)->get()->shuffle();
        $kategori = Kategori::latest('id')->get();


        $kontens = $kontens->shuffle();
        return view('beranda', [
            'kontensGrouped' => $kontensGrouped,
            'kontens' => $kontens,
            'featured' => $featured,
            'ekonomi' => $ekonomi,
            'teknologi' => $teknologi,
            'olahraga' => $olahraga,
            'politik' => $politik,
            'popular' => $popular,
            'popular2' => $popular2,
            'latest' => $latest,
            'kategori' => $kategori,
        ]);
    }


    public function showByCategory($id)
    {
        $category = Kategori::findOrFail($id);

        // Fetch articles related to the selected category
        $konten = Kontens::where('kategori', $id)->get();
    
        // Return the view with the data
        return view('kategori', [
            'category' => $category,
            'konten' => $konten,
        ]);    }





    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $kontens = Kontens::latest(column: 'id')->take(10)->get()->shuffle();
        $detail = Kontens::where('slug', $slug)->firstOrFail();
        return view('detail', [
            'detail' => $detail,
            'kontens' => $kontens,
        ]);
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
