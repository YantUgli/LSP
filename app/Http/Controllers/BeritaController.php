<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $berita = berita::all();
        return view('berita.index', [
            'berita' => $berita
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
            'berita.create', [
            'kategoriberita' => kategoriberita::all()
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
        $request->validate([
           
            'judul' => 'required |unique:berita,judul',
            'berita' => 'required',
            'tgl_post'  => 'required',
            'id_kategori_berita' => 'required',
            'foto' => 'image|required'
            ]);
            $array = $request->only([
           
            'judul',
            'berita',
            'tgl_post',
            'id_kategori_berita',
            'foto'
            
           
                          
            ]);
          
        //    berita::create($array);

        $array['foto'] = $request->file('foto')->store('Foto');
        $tambah=Berita::create($array);
        if($tambah) $request->file('foto')->store('Foto');
            return redirect()->route('berita.index')
            ->with('success_message', 'Berhasil Menambah berita Baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $berita = berita::find($id);
        if (!$berita) return redirect()->route('berita.index')->with('error_message', 'Standar Kompetensi dengan id = '.$id.'tidak ditemukan');
 return view('berita.edit', [ 
 'berita' => $berita,
 'kategoriberita' => KategoriBerita::all() ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

            $fields = ['judul','berita', 'alamat', 'no_hp', 'tgl_post', 'id_kategori_berita'];

            $berita = Berita::findOrFail($id);

            foreach ($fields as $f) {
                // if ($f == 'foto' || $f == 'id_kategori_berita') {
                //     continue;
                // }
             
                if ($f == ['foto','judul'] ) {
                    continue;
                }
               

                if ($request->has ($f)) {
                    $request->validate([$f => 'required']);
                    $request->validate(['foto' => 'image']);
                    // $request->validate(['judul' => 'unique:berita,judul']);

                    $berita[$f] = $request[$f];
                }
               
    
            }
    
        // $request->validate([  
        //     'judul' => 'required', 
        //     'berita' => 'required', 
        //     'tgl_post' => 'required', 
        //     'id_ketegori_berita' => 'required', 
            // 'foto' => ' image'
            // ]); 
        //     $berita = berita::findOrFail($id); 
        //     $berita->judul = $request->judul; 
        //     $berita->berita = $request->berita;  
        //     $berita->tgl_post = $request->tgl_post; 
            // $berita->id_kategori_berita = $request->id_kategori_berita; 
        //     $berita->foto = $request->foto; 

            if ($request->has('foto')) {
                if ($request->oldfoto) {
                    Storage::delete($request->oldfoto);
                }
                $berita->foto = $request->file('foto')->store('Foto');
            }

            $berita->save(); 
            return redirect()->route('berita.index') ->with('success_message', 'Berhasil Mengubah berita'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $berita = berita::find($id);
        if ($berita->foto) {
            Storage::delete($berita->foto);
        }
        if ($berita) $berita->delete();
        return redirect()->route('berita.index') ->with('success_message', 'Berhasil menghapus berita "' . $berita->judul . '" !');
    }
}