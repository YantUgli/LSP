@extends('adminlte::page')
@section('title', 'Edit Paket Wisata')
@section('content_header')<h1 class="m-0 text-dark">Edit Paket Wisata</h1>
@stop
@section('content')
<form action="{{route('paketwisata.update', $paketwisata)}}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_paket">Nama Paket</label>
                        <input type="text" class="form-control 
@error('nama_paket') is-invalid @enderror" id="nama_paket" placeholder="Masukan Nama Paket" name="nama_paket"
                            value="{{$paketwisata->nama_paket   ?? old('nama_paket')}}">
                        @error('nama_paket') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control 
@error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Tulis Deskripsi"
                            name="deskripsi" value="{{$paketwisata->deskripsi  ?? old('deskripsi')}}">
                        @error('deskripsi') <span class="text-danger">{{$message}}</span> @enderror
                    </div>


                    <div class="form-group">
                        <label for="fasilitas">Fasilitas</label>
                        <input type="text" class="form-control 
@error('fasilitas') is-invalid @enderror" id="fasilitas" placeholder="Tulisakan Fasilitas" name="fasilitas"
                            value="{{$paketwisata->fasilitas   ?? old('fasilitas')}}">
                        @error('fasilitas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>



                    <div class="form-group">
                        <label for="harga_per_pack">Harga</label>
                        <input type="number" class="form-control 
@error('harga_per_pack') is-invalid @enderror" id="harga_per_pack" placeholder="Masukan Harga" name="harga_per_pack"
                            value="{{$paketwisata->harga_per_pack   ?? old('harga_per_pack')}}">
                        @error('harga_per_pack') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="diskon">Diskon</label>
                        <input type="number" class="form-control 
@error('diskon') is-invalid @enderror" id="diskon" placeholder="Tulisakan diskon" name="diskon"
                            value="{{$paketwisata->diskon   ?? old('diskon')}}">
                        @error('diskon') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    


                        <div class="form-group">
                            <label for="foto1">Foto 1</label>
                            <input type="hidden" name="oldfoto1" value="{{ $paketwisata->foto1 }}">
                            <img src="{{ asset('storage/' . $paketwisata->foto1) }}" class="img-thumbnail d-block  border-0" name="tampil1" width="15%" id="tampil1">
                            <input type="file" class="form-control 
    @error('foto1') is-invalid @enderror" id="foto1" placeholder="Masukan Foto" name="foto1" value="{{old('foto1')}}">
                            @error('foto1') <span class="text-danger">{{$message}}</span> @enderror
                        </div>


                        <div class="form-group">
                            <label for="foto2">Foto 2</label>
                            <input type="hidden" name="oldfoto1" value="{{ $paketwisata->foto2 }}">
                            <img src="{{ asset('storage/' . $paketwisata->foto2) }}" class="img-thumbnail d-block  border-0" name="tampil2" width="15%" id="tampil2">
                            <input type="file" class="form-control 
    @error('foto2') is-invalid @enderror" id="foto2" placeholder="Masukan Foto" name="foto2" value="{{old('foto2')}}">
                            @error('foto2') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="foto3">Foto 3</label>
                            <input type="hidden" name="oldfoto1" value="{{ $paketwisata->foto3 }}">
                            <img src="{{ asset('storage/' . $paketwisata->foto3) }}"  class="img-thumbnail d-block  border-0" name="tampil3" width="15%" id="tampil3">
                            <input type="file" class="form-control 
    @error('foto3') is-invalid @enderror" id="foto3" placeholder="Masukan Foto" name="foto3" value="{{old('foto3')}}">
                            @error('foto3') <span class="text-danger">{{$message}}</span> @enderror
                        </div>


                        <div class="form-group">
                            <label for="foto4">Foto 4</label>
                            <input type="hidden" name="oldfoto1" value="{{ $paketwisata->foto4 }}">
                            <img src="{{ asset('storage/' . $paketwisata->foto4) }}"  class="img-thumbnail d-block  border-0" name="tampil4" width="15%" id="tampil4">
                            <input type="file" class="form-control 
    @error('foto4') is-invalid @enderror" id="foto4" placeholder="Masukan Foto" name="foto4" value="{{old('foto4')}}">
                            @error('foto4') <span class="text-danger">{{$message}}</span> @enderror
                        </div>


                        <div class="form-group">
                            <label for="foto5">Foto 5</label>
                            <input type="hidden" name="oldfoto1" value="{{ $paketwisata->foto5 }}">
                            <img src="{{ asset('storage/' . $paketwisata->foto5) }}" class="img-thumbnail d-block  border-0" name="tampil5" width="15%" id="tampil5">
                            <input type="file" class="form-control 
    @error('foto5') is-invalid @enderror" id="foto5" placeholder="Masukan Foto" name="foto5" value="{{old('foto5')}}">
                            @error('foto5') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('obyekwisata.index')}}" class="btn btn-danger">
                        Batal
                    </a></div>
            </div>
        </div>
    </div>
   
    @stop
    @push('js')
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });
       
       
    </script>


    <script>
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#tampil1').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto1").change(function () {
            readURL1(this);
        });
    </script>


    <script>
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#tampil2').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto2").change(function () {
            readURL2(this);
        });
    </script>

    <script>
        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#tampil3').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto3").change(function () {
            readURL3(this);
        });
    </script>

    <script>
        function readURL4(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#tampil4').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto4").change(function () {
            readURL4(this);
        });
    </script>


    <script>
        function readURL5(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#tampil5').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto5").change(function () {
            readURL5(this);
        });
    </script>

    @endpush