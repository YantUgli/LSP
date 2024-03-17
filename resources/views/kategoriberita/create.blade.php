@extends('adminlte::page')
@section('title', 'Tambah Kategori Berita')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Kategori Berita</h1>
@stop
@section('content')
<form action="{{route('kategoriberita.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="kategori_berita">Kategori Berita</label>
                        <input type="text" class="form-control 
@error('kategori_berita') is-invalid @enderror" id="kategori_berita" placeholder="Masukan Kategori" name="kategori_berita"
                            value="{{old('kategori_berita')}}">
                        @error('kategori_berita') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('kategoriberita.index')}}" class="btn 
btn-danger">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop