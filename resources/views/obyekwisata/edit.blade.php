@extends('adminlte::page')
@section('title', 'Edit Obyek Wisata')
@section('content_header')<h1 class="m-0 text-dark">Edit Obyek Wisata</h1>
@stop
@section('content')
<form action="{{route('obyekwisata.update', $obyekwisata)}}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_wisata">Nama Wisata</label>
                        <input type="text" class="form-control 
@error('nama_wisata') is-invalid @enderror" id="nama_wisata" placeholder="Masukan Nama Wisata" name="nama_wisata"
                            value="{{$obyekwisata->nama_wisata   ?? old('nama_wisata')}}">
                        @error('nama_wisata') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="deskripsi_wisata">Deskripsi Wisata</label>
                        <input type="text" class="form-control 
@error('deskripsi_wisata') is-invalid @enderror" id="deskripsi_wisata" placeholder="Tulis Deskripsi Wisata"
                            name="deskripsi_wisata" value="{{$obyekwisata->deskripsi_wisata  ?? old('deskripsi_wisata')}}">
                        @error('deskripsi_wisata') <span class="text-danger">{{$message}}</span> @enderror
                    </div>


                    <div class="form-group">
                        <label for="fasilitas">fasilitas</label>
                        <input type="text" class="form-control 
@error('fasilitas') is-invalid @enderror" id="fasilitas" placeholder="Tulisakan Fasilitas" name="fasilitas"
                            value="{{$obyekwisata->fasilitas   ?? old('fasilitas')}}">
                        @error('fasilitas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="id_kategori_wisata">Id Kategori</label>
                        <div class="input-group">
                            <input type="hidden" name="id_kategori_wisata" id="id_kategori_wisata"
                                value="{{$obyekwisata->kategoriwisata->id ?? old('id_kategori_wisata')}}">
                            <input type="text" class="form-control 
@error('kategori_wisata') is-invalid @enderror" placeholder="Temukan id Kategori" id="kategori_wisata"
                                name="kategori_wisata" value="{{$obyekwisata->kategoriwisata->kategori_wisata ?? old('kategori_wisata')}}" aria-label="user"
                                aria-describedby="cari" readonly>

                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop"></i>
                                Cari Kategori Wisata</button>

                        </div>
                        @error('id_kategori_berita') <span class="text-danger">{{$message}}</span> @enderror

                        <div class="form-group">
                            <label for="foto1">Foto 1</label>
                            <input type="hidden" name="oldfoto1" value="{{ $obyekwisata->foto1 }}">
                            <img src="{{ asset('storage/' . $obyekwisata->foto1) }}" class="img-thumbnail d-block  border-0" name="tampil1" width="15%" id="tampil1">
                            <input type="file" class="form-control 
    @error('foto1') is-invalid @enderror" id="foto1" placeholder="Masukan Foto" name="foto1" value="{{$obyekwisata->foto1  ?? old('foto1')}}">
                            @error('foto1') <span class="text-danger">{{$message}}</span> @enderror
                        </div>


                        <div class="form-group">
                            <label for="foto2">Foto 2</label>
                             <input type="hidden" name="oldfoto2" value="{{ $obyekwisata->foto2 }}">
                            <img src="{{ asset('storage/' . $obyekwisata->foto2) }}" class="img-thumbnail d-block  border-0" name="tampil2" width="15%" id="tampil2">
                            <input type="file" class="form-control 
    @error('foto2') is-invalid @enderror" id="foto2" placeholder="Masukan Foto" name="foto2" value="{{$obyekwisata->foto2 ?? old('foto2')}}">
                            @error('foto2') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="foto3">Foto 3</label>
                             <input type="hidden" name="oldfoto3" value="{{ $obyekwisata->foto3 }}">
                            <img src="{{ asset('storage/' . $obyekwisata->foto3) }}" class="img-thumbnail d-block  border-0" name="tampil3" width="15%" id="tampil3">
                            <input type="file" class="form-control 
    @error('foto3') is-invalid @enderror" id="foto3" placeholder="Masukan Foto" name="foto3" value="{{$obyekwisata->foto3  ?? old('foto3')}}">
                            @error('foto3') <span class="text-danger">{{$message}}</span> @enderror
                        </div>


                        <div class="form-group">
                            <label for="foto4">Foto 4</label>
                            <input type="hidden" name="oldfoto4" value="{{ $obyekwisata->foto4 }}">
                            <img src="{{ asset('storage/' . $obyekwisata->foto4) }}" class="img-thumbnail d-block  border-0" name="tampil4" width="15%" id="tampil4">
                            <input type="file" class="form-control 
    @error('foto4') is-invalid @enderror" id="foto4" placeholder="Masukan Foto" name="foto4" value="{{$obyekwisata->foto4 ?? old('foto4')}}">
                            @error('foto4') <span class="text-danger">{{$message}}</span> @enderror
                        </div>


                        <div class="form-group">
                            <label for="foto5">Foto 5</label>
                             <input type="hidden" name="oldfoto5" value="{{ $obyekwisata->foto5 }}">
                            <img src="{{ asset('storage/' . $obyekwisata->foto5) }}" class="img-thumbnail d-block  border-0" name="tampil5" width="15%" id="tampil5">
                            <input type="file" class="form-control 
    @error('foto5') is-invalid @enderror" id="foto5" placeholder="Masukan Foto" name="foto5" value="{{$obyekwisata->foto5  ?? old('foto5')}}">
                            @error('foto5') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('obyekwisata.index')}}" class="btn btn-danger">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Kategori</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kategori wisata</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kategoriwisata as $key => $user)
                            <tr>
                                <td>{{$key+1}}</td>

                                <td id={{$key+1}} > {{$user->kategori_wisata}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary 
btn-xs" onclick="pilih('{{$user->id}}', '{{$user->kategori_wisata}}')" data-bs-dismiss="modal">
                                        Pilih
                                    </button>
                                </td>
                            </tr>@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
    @stop
    @push('js')
    <script>
    $('#example2').DataTable({
        "responsive": true,
    });
    //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Bidang Studi dari Modal ke form tambah
    function pilih(id, kategori_wisata) {
        document.getElementById('id_kategori_wisata').value = id
        document.getElementById('kategori_wisata').value = kategori_wisata
    }
    </script>


    <script>
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#tampil1').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#foto1").change(function() {
        readURL1(this);
    });
    </script>


    <script>
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#tampil2').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#foto2").change(function() {
        readURL2(this);
    });
    </script>

    <script>
    function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#tampil3').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#foto3").change(function() {
        readURL3(this);
    });
    </script>

    <script>
    function readURL4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#tampil4').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#foto4").change(function() {
        readURL4(this);
    });
    </script>


    <script>
    function readURL5(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#tampil5').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#foto5").change(function() {
        readURL5(this);
    });
    </script>

    @endpush