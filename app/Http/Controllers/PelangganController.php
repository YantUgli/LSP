<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Storage;


class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', [
            'pelanggan' => $pelanggan
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
            'pelanggan.create', [
            'users' => user::all()
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
           
            'nama_lengkap' => 'required ',
            'alamat' => 'required',
            'no_hp' => 'required',
            'foto' => ' required',
            'id_user' => 'required'
            ]);
            $array = $request->only([
            'nama_lengkap', 'alamat', 'no_hp',  'id_user','foto'
            ]);
            
            $array['foto'] = $request->file('foto')->store('Pelanggan');
        $tambah=Pelanggan::create($array);
        if($tambah) $request->file('foto')->store('Pelanggan');
            return redirect()->route('pelanggan.index')
            ->with('success_message', 'Berhasil Menambah Pelanggan Baru');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pelanggan = pelanggan::find($id);
        if (!$pelanggan) return redirect()->route('pelanggan.index')->with('error_message', 'pelanggan dengan id = '.$id.'tidak ditemukan');
 return view('pelanggan.edit', [ 
 'pelanggan' => $pelanggan,
 'users' => User::all() ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

            $fields = [ 'nama_lengkap', 'alamat', 'no_hp',  'id_user','foto'];

            $pelanggan = pelanggan::findOrFail($id);

            foreach ($fields as $f) {
                // if ($f == 'foto' || $f == 'id_kategori_pelanggan') {
                //     continue;
                // }
             
                if ($f == ['foto'] ) {
                    continue;
                }
               

                if ($request->has ($f)) {
                    $request->validate([$f => 'required']);
                    $request->validate(['foto' => 'image']);
                    // $request->validate(['judul' => 'unique:pelanggan,judul']);

                    $pelanggan[$f] = $request[$f];
                }
               
    
            }
    
       

            if ($request->has('foto')) {
                if ($request->oldfoto) {
                    Storage::delete($request->oldfoto);
                }
                $pelanggan->foto = $request->file('foto')->store('Pelanggan');
            }

            $pelanggan->save(); 
            return redirect()->route('pelanggan.index') ->with('success_message', 'Berhasil Mengubah pelanggan'); 
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pelanggan = pelanggan::find($id);
        if ($pelanggan->foto) {
            Storage::delete($pelanggan->foto);
        }
        if ($pelanggan) $pelanggan->delete();
        return redirect()->route('pelanggan.index') ->with('success_message', 'Berhasil menghapus pelanggan "' . $pelanggan->nama_lengkap . '" !');
    }
}