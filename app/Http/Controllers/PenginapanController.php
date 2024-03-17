<?php

namespace App\Http\Controllers;

use App\Models\Penginapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenginapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $penginapan = Penginapan::all();
        return view('penginapan.index',[
            'penginapan' => $penginapan
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
            'penginapan.create', [
           
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
        $fields = ['nama_penginapan', 'deskripsi', 'fasilitas'];
       


        foreach ($fields as $f) {
            # code...
            if ($request->has ($f)) {
                $request->validate([$f => 'required']);
                $request->validate(['foto1','foto2','foto3', 'foto4', 'foto5' => 'image|required']);
                $request->validate(['nama_penginapan' => 'unique:penginapan,nama_penginapan']);

                $array[$f] = $request[$f];
            }
        }


        $array['foto1'] = $request->file('foto1')->store('Penginapan');
        $array['foto2'] = $request->file('foto2')->store('Penginapan');
        $array['foto3'] = $request->file('foto3')->store('Penginapan');
        $array['foto4'] = $request->file('foto4')->store('Penginapan');
        $array['foto5'] = $request->file('foto5')->store('Penginapan');
        $tambah=Penginapan::create($array);
        if($tambah) $request->file('foto1')->store('Penginapan');
        if($tambah) $request->file('foto2')->store('Penginapan');
        if($tambah) $request->file('foto3')->store('Penginapan');
        if($tambah) $request->file('foto4')->store('Penginapan');
        if($tambah) $request->file('foto5')->store('Penginapan');
        return redirect()->route('penginapan.index')
            ->with('success_message', 'Berhasil Menambah Penginapan');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penginapan  $penginapan
     * @return \Illuminate\Http\Response
     */
    public function show(Penginapan $penginapan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penginapan  $penginapan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $penginapan = Penginapan::find($id);
        if (!$penginapan) return redirect()->route('penginapan.index')->with('error_message', 'Penginapan dengan id = '.$id.'tidak ditemukan');
 return view('penginapan.edit', [ 
 'penginapan' => $penginapan,
  ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penginapan  $penginapan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $fields = ['nama_penginapan', 'deskripsi', 'fasilitas'];

            $penginapan = Penginapan::findOrFail($id);

            foreach ($fields as $f) {
               
                if ($f == ['nama_penginapan','foto1','foto2','foto3', 'foto4', 'foto5'] ) {
                    continue;
                }
               

                if ($request->has ($f)) {
                    $request->validate([$f => 'required']);
                    $request->validate(['foto1','foto2','foto3', 'foto4', 'foto5' => 'image']);
                    $penginapan[$f] = $request[$f];
                }
               
    
            }
    
       

            if ($request->has('foto1')) {
                if ($request->oldfoto1) {
                    Storage::delete($request->oldfoto1);
                }
                $penginapan->foto1 = $request->file('foto1')->store('Penginapan');
            }

            if ($request->has('foto2')) {
                if ($request->oldfoto2) {
                    Storage::delete($request->oldfoto2);
                }
                $penginapan->foto2 = $request->file('foto2')->store('Penginapan');
            }

            if ($request->has('foto3')) {
                if ($request->oldfot3) {
                    Storage::delete($request->oldfoto3);
                }
                $penginapan->foto3 = $request->file('foto3')->store('Penginapan');
            }

            if ($request->has('foto4')) {
                if ($request->oldfoto4) {
                    Storage::delete($request->oldfoto4);
                }
                $penginapan->foto4 = $request->file('foto4')->store('Penginapan');
            }

            if ($request->has('foto5')) {
                if ($request->oldfoto5) {
                    Storage::delete($request->oldfoto5);
                }
                $penginapan->foto5 = $request->file('foto5')->store('Penginapan');
            }



            $penginapan->save(); 
            return redirect()->route('penginapan.index') ->with('success_message', 'Berhasil Mengubah Penginapan'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\penginapan  $penginapan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $penginapan = penginapan::find($id);
        if ($penginapan) {
           $hapus = $penginapan->delete();
           if($hapus) unlink("storage/" . $penginapan->foto1);
           if($hapus) unlink("storage/" . $penginapan->foto2);
           if($hapus) unlink("storage/" . $penginapan->foto3);
           if($hapus) unlink("storage/" . $penginapan->foto4);
           if($hapus) unlink("storage/" . $penginapan->foto5);
        }

        return redirect()->route('penginapan.index') ->with('success_message', 'Berhasil menghapus Penginapan "' . $penginapan->nama_penginapan . '" !');
    }
}