<?php

namespace App\Http\Controllers;

use App\Models\KategoriWisata;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateKategoriWisataRequest;

class KategoriWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Menampilkan
        $kategoriwisata = KategoriWisata::all();
        return view('kategoriwisata.index',[
            'kategoriwisata' => $kategoriwisata
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
        return view('kategoriwisata.create');
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
            'kategori_wisata' => 'required'
            ]);
            $array = $request->only([
            'kategori_wisata'
            ]);
            KategoriWisata::create($array);
            return redirect()->route('kategoriwisata.index')->with('success_message', 'Berhasil menambah kategori wisata baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriWisata  $kategoriWisata
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriWisata $kategoriWisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriWisata  $kategoriWisata
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan edit
        $kategoriwisata = kategoriwisata::find($id);
        if (!$kategoriwisata) return redirect()->route('kategoriwisata.index')->with('error_message', 'kategori wisata dengan id = '.$id.' tidak ditemukan');
        return view('kategoriwisata.edit', [ 
            'kategoriwisata' => $kategoriwisata
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
            'kategori_wisata' =>'required'
            ]);
            $kategoriwisata = kategoriwisata::find($id);
            $kategoriwisata->kategori_wisata = $request->kategori_wisata;
            $kategoriwisata->save();
            return redirect()->route('kategoriwisata.index')->with('success_message', 'Berhasil mengubah kategori wisata');
            
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
        $kategoriwisata = kategoriwisata::find($id);
        if ($kategoriwisata) $kategoriwisata->delete();
        return redirect()->route('kategoriwisata.index') ->with('success_message', 'Berhasil menghapus kategori "' . $kategoriwisata->kategori_wisata . '" !');
    }
}