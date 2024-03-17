<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Paketwisata;
use Illuminate\Support\Str;
use App\Models\Penginapan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $berita = Berita::all();
        // $berita = Str::limit($berita->berita,10);
        $paket = Paketwisata::all();
        return view('homepage', compact('berita','paket')
        );
    }
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }



    public function show($id)
{

    $blog = Berita::find($id);
    
    return view('berita', compact('blog'));
}




public function blogs()
{

    $berita = Berita::all();
    // $berita = Str::limit($berita->berita,10);
   
    return view('blogs', compact('berita')
    );
}
}