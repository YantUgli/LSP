<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use Illuminate\Http\Request;
use App\Models\User;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan karyawan
        $karyawan = karyawan::all();
        return view('karyawan.index', [
            'karyawan' => $karyawan
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
            'karyawan.create', [
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
           
            'nama_karyawan' => 'required ',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jabatan' => 'required',
            'id_user' => 'required |unique:karyawan,id_user'
            ]);
            $array = $request->only([
            'nama_karyawan', 'alamat', 'no_hp', 'jabatan', 'id_user'
            ]);
          
            karyawan::create($array);
            return redirect()->route('karyawan.index')
            ->with('success_message', 'Berhasil Menambah Karyawan Baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $karyawan = karyawan::find($id);
        if (!$karyawan) return redirect()->route('karyawan.index')->with('error_message', 'Karyawan dengan id = '.$id.'tidak ditemukan');
 return view('karyawan.edit', [ 
 'karyawan' => $karyawan,
 'users' => User::all() ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([  
            'nama_karyawan' => 'required', 
            'alamat' => 'required', 
            'no_hp' => 'required', 
            'jabatan' => 'required', 
            'id_user' =>  'required '
            ]); 
            $karyawan = karyawan::find($id); 
            $karyawan->nama_karyawan = $request->nama_karyawan; 
            $karyawan->alamat = $request->alamat;  
            $karyawan->no_hp = $request->no_hp; 
            $karyawan->jabatan = $request->jabatan; 
            $karyawan->id_user = $request->id_user; 
            $karyawan->save(); 
            return redirect()->route('karyawan.index') ->with('success_message', 'Berhasil Mengubah karyawan'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $karyawan = karyawan::find($id);
        if ($karyawan) $karyawan->delete();
        return redirect()->route('karyawan.index') ->with('success_message', 'Berhasil menghapus karyawan"' . $karyawan->nama_karyawan . '" !');
    }
    
}