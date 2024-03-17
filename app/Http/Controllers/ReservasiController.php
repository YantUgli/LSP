<?php

namespace App\Http\Controllers;

use App\Models\Paketwisata;
use App\Models\Pelanggan;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservasi = reservasi::all();
        return view('reservasi.index',[
            'reservasi' => $reservasi
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
            'reservasi.create', [
            'pelanggan' => Pelanggan::all(),
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
        // dd($request->all());
        $fields = [
            'id_pelanggan',
            'id_paket',
            'tgl_reservasi_wisata',
            'harga',
            'jumlah_peserta',
            'diskon',
            'nilai_diskon',
            'total_bayar',
            'file_bukti_tf',
            'status_reservasi_wisata' 
        ];
       


        foreach ($fields as $f) {
            # code...
            if ($request->has ($f)) {
                $request->validate([$f => 'required']);
                $request->validate(['file_bukti_tf' => 'image|required']);
                $array[$f] = $request[$f];
            }
        }


        $array['file_bukti_tf'] = $request->file('file_bukti_tf')->store('Reservasi');
    
        $tambah=Reservasi::create($array);
        if($tambah) $request->file('file_bukti_tf')->store('Reservasi');
    
        return redirect()->route('reservasi.index')
            ->with('success_message', 'Berhasil Menambah Reservasi Baru');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function cetak()
    {
        $reservasi = reservasi::all();
        return view('reservasi.cetak',[
            'reservasi' => $reservasi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $reservasi = reservasi::find($id);
        if (!$reservasi) return redirect()->route('reservasi.index')->with('error_message', 'Reservasi dengan id = '.$id.'tidak ditemukan');
 return view('reservasi.edit', [ 
 'reservasi' => $reservasi,
 'pelanggan' => Pelanggan::all(),
 'paketwisata' => Paketwisata::all()
 ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $fields = [
        'id_pelanggan',
        'id_paket',
        'tgl_reservasi_wisata',
        'harga',
        'jumlah_peserta',
        'diskon',
        'nilai_diskon',
        'total_bayar',
        'file_bukti_tf',
        'status_reservasi_wisata' 
    ];

            $reservasi = reservasi::findOrFail($id);

            foreach ($fields as $f) {
               
                if ($f == ['file_bukti_tf'] ) {
                    continue;
                }
               

                if ($request->has ($f)) {
                    $request->validate([$f => 'required']);
                    $request->validate(['file_bukti_tf' => 'image']);
                    $reservasi[$f] = $request[$f];
                }
               
    
            }
    
       

            if ($request->has('file_bukti_tf')) {
                if ($request->oldfoto1) {
                    Storage::delete($request->oldfoto1);
                }
                $reservasi->foto1 = $request->file('file_bukti_tf')->store('Reservasi');
            }

          



            $reservasi->save(); 
            return redirect()->route('reservasi.index') ->with('success_message', 'Berhasil Mengubah Reservasi'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $reservasi = reservasi::find($id);
        if ($reservasi) {
           $hapus = $reservasi->delete();
           if($hapus) unlink("storage/" . $reservasi->file_bukti_tf);
         
        }
       
        return redirect()->route('reservasi.index') ->with('success_message', 'Berhasil menghapus Reservasi "' . $reservasi->paketwisata->nama_paket . '" pesanan "' . $reservasi->pelanggan->nama_lengkap . '"!');
    }
}