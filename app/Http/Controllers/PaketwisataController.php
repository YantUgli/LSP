<?php

namespace App\Http\Controllers;

use App\Models\Paketwisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PaketwisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $paketwisata = paketwisata::all();
        return view('paketwisata.index',[
            'paketwisata' => $paketwisata
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'paketwisata.create', [
            'paketwisata' => Paketwisata::all()
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
        $fields = ['nama_paket', 'deskripsi', 'fasilitas', 'harga_per_pack', 'diskon'];
       


        foreach ($fields as $f) {
            # code...
            if ($request->has ($f)) {
                $request->validate([$f => 'required']);
                $request->validate(['foto1','foto2','foto3', 'foto4', 'foto5' => 'image|required']);
                $request->validate(['nama_paket' => 'unique:paket_wisata,nama_paket']);

                $array[$f] = $request[$f];
            }
        }


        $array['foto1'] = $request->file('foto1')->store('Paket');
        $array['foto2'] = $request->file('foto2')->store('Paket');
        $array['foto3'] = $request->file('foto3')->store('Paket');
        $array['foto4'] = $request->file('foto4')->store('Paket');
        $array['foto5'] = $request->file('foto5')->store('Paket');
        $tambah=Paketwisata::create($array);
        if($tambah) $request->file('foto1')->store('Paket');
        if($tambah) $request->file('foto2')->store('Paket');
        if($tambah) $request->file('foto3')->store('Paket');
        if($tambah) $request->file('foto4')->store('Paket');
        if($tambah) $request->file('foto5')->store('Paket');
        return redirect()->route('paketwisata.index')
            ->with('success_message', 'Berhasil Menambah Paket Baru');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paketwisata  $paketwisata
     * @return \Illuminate\Http\Response
     */
    public function show(Paketwisata $paketwisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paketwisata  $paketwisata
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $paketwisata = paketwisata::find($id);
        if (!$paketwisata) return redirect()->route('paketwisata.index')->with('error_message', 'Paket Wisata dengan id = '.$id.'tidak ditemukan');
 return view('paketwisata.edit', [ 
 'paketwisata' => $paketwisata,
 ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paketwisata  $paketwisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $fields = ['nama_paket', 'deskripsi', 'fasilitas', 'harga_per_pack', 'diskon'];

            $paketwisata = Paketwisata::findOrFail($id);

            foreach ($fields as $f) {
               
                if ($f == ['foto1','foto2','foto3', 'foto4', 'foto5','nama_paket'] ) {
                    continue;
                }
               

                if ($request->has ($f)) {
                    $request->validate([$f => 'required']);
                    $request->validate(['foto1','foto2','foto3', 'foto4', 'foto5' => 'image']);
                   

                    $paketwisata[$f] = $request[$f];
                }
               
    
            }
    
       

            if ($request->has('foto1')) {
                if ($request->oldfoto1) {
                    Storage::delete($request->oldfoto1);
                }
                $paketwisata->foto1 = $request->file('foto1')->store('Paket');
            }

            if ($request->has('foto2')) {
                if ($request->oldfoto2) {
                    Storage::delete($request->oldfoto2);
                }
                $paketwisata->foto2 = $request->file('foto2')->store('Paket');
            }

            if ($request->has('foto3')) {
                if ($request->oldfot3) {
                    Storage::delete($request->oldfoto3);
                }
                $paketwisata->foto3 = $request->file('foto3')->store('Paket');
            }

            if ($request->has('foto4')) {
                if ($request->oldfoto4) {
                    Storage::delete($request->oldfoto4);
                }
                $paketwisata->foto4 = $request->file('foto4')->store('Paket');
            }

            if ($request->has('foto5')) {
                if ($request->oldfoto5) {
                    Storage::delete($request->oldfoto5);
                }
                $paketwisata->foto5 = $request->file('foto5')->store('Paket');
            }



            $paketwisata->save(); 
            return redirect()->route('paketwisata.index') ->with('success_message', 'Berhasil Mengubah Paket'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paketwisata  $paketwisata
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $paketwisata = paketwisata::find($id);
        if ($paketwisata) {
           $hapus = $paketwisata->delete();
           if($hapus) unlink("storage/" . $paketwisata->foto1);
           if($hapus) unlink("storage/" . $paketwisata->foto2);
           if($hapus) unlink("storage/" . $paketwisata->foto3);
           if($hapus) unlink("storage/" . $paketwisata->foto4);
           if($hapus) unlink("storage/" . $paketwisata->foto5);
        }
       
        return redirect()->route('paketwisata.index') ->with('success_message', 'Berhasil menghapus Obyek Wisata "' . $paketwisata->nama_paket . '" !');
    }
}