<?php

namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class KategoriBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kategoriberita = Kategoriberita::all();
        return view('kategoriberita.index',[
            'kategoriberita' => $kategoriberita
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //menambah
        return view('kategoriberita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKategoriWisataRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //menyimpan
        $request->validate([
            'kategori_berita' => 'required'
            ]);
            $array = $request->only([
            'kategori_berita'
            ]);
            Kategoriberita::create($array);
            return redirect()->route('kategoriberita.index')->with('success_message', 'Berhasil menambah kategori berita baru');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriBerita  $kategoriBerita
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriBerita $kategoriBerita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriBerita  $kategoriBerita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan edit
        $kategoriberita = kategoriberita::find($id);
        if (!$kategoriberita) return redirect()->route('kategoriberita.index')->with('error_message', 'kategori berita dengan id = '.$id.' tidak ditemukan');
        return view('kategoriberita.edit', [ 
            'kategoriberita' => $kategoriberita
        ]);
  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKategoriWisataRequest  $request
     * @param  \App\Models\KategoriWisata  $kategoriWisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $request->validate([
            'kategori_berita' =>'required'
            ]);
            $kategoriberita = kategoriberita::find($id);
            $kategoriberita->kategori_berita = $request->kategori_berita;
            $kategoriberita->save();
            return redirect()->route('kategoriberita.index')->with('success_message', 'Berhasil mengubah kategori berita');
            
    }

    /*kategoriwisata
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriWisata  $kategoriWisata
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $kategoriberita = kategoriberita::find($id);
        if ($kategoriberita) $kategoriberita->delete();
        return redirect()->route('kategoriberita.index') ->with('success_message', 'Berhasil menghapus kategori "' . $kategoriberita->kategori_berita . '" !');
    }
}