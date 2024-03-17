<?php

namespace App\Http\Controllers;

use App\Models\ObyekWisata;
use Illuminate\Http\Request;
use App\Models\KategoriWisata;
use Illuminate\Support\Facades\Storage;

class ObyekWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $obyekwisata = ObyekWisata::all();
        return view('obyekwisata.index',[
            'obyekwisata' => $obyekwisata
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view(
            'obyekwisata.create', [
            'kategoriwisata' => kategoriwisata::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $fields = ['nama_wisata', 'deskripsi_wisata', 'fasilitas', 'id_kategori_wisata'];
       


        foreach ($fields as $f) {
            # code...
            if ($request->has ($f)) {
                $request->validate([$f => 'required']);
                $request->validate(['foto1','foto2','foto3', 'foto4', 'foto5' => 'image|required']);
                $array[$f] = $request[$f];
            }
        }


        $array['foto1'] = $request->file('foto1')->store('Wisata');
        $array['foto2'] = $request->file('foto2')->store('Wisata');
        $array['foto3'] = $request->file('foto3')->store('Wisata');
        $array['foto4'] = $request->file('foto4')->store('Wisata');
        $array['foto5'] = $request->file('foto5')->store('Wisata');
        $tambah=ObyekWisata::create($array);
        if($tambah) $request->file('foto1')->store('Wisata');
        if($tambah) $request->file('foto2')->store('Wisata');
        if($tambah) $request->file('foto3')->store('Wisata');
        if($tambah) $request->file('foto4')->store('Wisata');
        if($tambah) $request->file('foto5')->store('Wisata');
        return redirect()->route('obyekwisata.index')
            ->with('success_message', 'Berhasil Menambah Wisata Baru');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ObyekWisata  $obyekWisata
     * @return \Illuminate\Http\Response
     */
    public function show(ObyekWisata $obyekWisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ObyekWisata  $obyekWisata
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $obyekwisata = obyekwisata::find($id);
        if (!$obyekwisata) return redirect()->route('obyekwisata.index')->with('error_message', 'Obyek Wisata dengan id = '.$id.'tidak ditemukan');
 return view('obyekwisata.edit', [ 
 'obyekwisata' => $obyekwisata,
 'kategoriwisata' => KategoriWisata::all() ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ObyekWisata  $obyekWisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $fields = ['nama_wisata', 'deskripsi_wisata', 'fasilitas', 'id_kategori_wisata'];

            $obyekwisata = obyekwisata::findOrFail($id);

            foreach ($fields as $f) {
               
                if ($f == ['foto1','foto2','foto3', 'foto4', 'foto5'] ) {
                    continue;
                }
               

                if ($request->has ($f)) {
                    $request->validate([$f => 'required']);
                    $request->validate(['foto1','foto2','foto3', 'foto4', 'foto5' => 'image']);
                    $obyekwisata[$f] = $request[$f];
                }
               
    
            }
    
       

            if ($request->has('foto1')) {
                if ($request->oldfoto1) {
                    Storage::delete($request->oldfoto1);
                }
                $obyekwisata->foto1 = $request->file('foto1')->store('Wisata');
            }

            if ($request->has('foto2')) {
                if ($request->oldfoto2) {
                    Storage::delete($request->oldfoto2);
                }
                $obyekwisata->foto2 = $request->file('foto2')->store('Wisata');
            }

            if ($request->has('foto3')) {
                if ($request->oldfot3) {
                    Storage::delete($request->oldfoto3);
                }
                $obyekwisata->foto3 = $request->file('foto3')->store('Wisata');
            }

            if ($request->has('foto4')) {
                if ($request->oldfoto4) {
                    Storage::delete($request->oldfoto4);
                }
                $obyekwisata->foto4 = $request->file('foto4')->store('Wisata');
            }

            if ($request->has('foto5')) {
                if ($request->oldfoto5) {
                    Storage::delete($request->oldfoto5);
                }
                $obyekwisata->foto5 = $request->file('foto5')->store('Wisata');
            }



            $obyekwisata->save(); 
            return redirect()->route('obyekwisata.index') ->with('success_message', 'Berhasil Mengubah Obyek Wisata'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ObyekWisata  $obyekWisata
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $obyekwisata = obyekwisata::find($id);
        if ($obyekwisata) {
           $hapus = $obyekwisata->delete();
           if($hapus) unlink("storage/" . $obyekwisata->foto1);
           if($hapus) unlink("storage/" . $obyekwisata->foto2);
           if($hapus) unlink("storage/" . $obyekwisata->foto3);
           if($hapus) unlink("storage/" . $obyekwisata->foto4);
           if($hapus) unlink("storage/" . $obyekwisata->foto5);
        }
       
        return redirect()->route('obyekwisata.index') ->with('success_message', 'Berhasil menghapus Obyek Wisata "' . $obyekwisata->nama_wisata . '" !');
    }
}