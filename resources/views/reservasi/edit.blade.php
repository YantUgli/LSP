@extends('adminlte::page')
@section('title', 'Edit Reservasi')
@section('content_header')
<h1 class="m-0 text-dark">Edit Reservasi</h1>
@stop
@section('content')
<form action="{{ route('reservasi.update', $reservasi) }}" method="post" enctype="multipart/form-data">
   @method('put')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_pelanggan">Id Pelanggan</label>
                        <div class="input-group">
                            <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="{{$reservasi->pelanggan->id ?? old('id_pelanggan')}}">
                            <input type="text" class="form-control 
@error('nama_lengkap') is-invalid @enderror" placeholder="Temukan id Pelanggan" id="nama_lengkap" name="nama_lengkap"
                                value="{{$reservasi->pelanggan->nama_lengkap  ?? old('nama_lengkap')}}" aria-label="user" aria-describedby="cari" readonly>

                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop"></i>
                                Cari Data Id Pelanggan</button>

                        </div>
                        @error('id_pelanggan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_paket">Data Daftar Wisata</label>
                        <div class="input-group">
                            <input type="hidden" name="id_paket" id="id_paket" value="{{$reservasi->paketwisata->id  ?? old('id_paket')}}">
                            <input type="text" class="form-control @error('nama_paket')  is-invalid  @enderror"
                                placeholder="Data Daftar Wisata" id="nama_paket" name="nama_paket"
                                value="{{$reservasi->paketwisata->nama_paket   ?? old('nama_paket')}}" aria-label="nama_paket" aria-describedby="cari" readonly>
                            <button class="btn  btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop1"></i> Cari Data Daftar Paket</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_reservasi_wisata">tanggal Reservasi</label>
                        <input type="datetime-local" class="form-control 
@error('tgl_reservasi_wisata') is-invalid @enderror" id="tgl_reservasi_wisata" placeholder="Tanggal Reservasi"
                            name="tgl_reservasi_wisata" value="{{$reservasi->tgl_reservasi_wisata   ?? old('tgl_reservasi_wisata')}}">
                        @error('tgl_reservasi_wisata') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control 
@error('harga') is-invalid @enderror" id="harga" readonly onkeyup="hitung()" placeholder="Harga" name="harga"
                            value="{{$reservasi->harga   ?? old('harga')}}">
                        @error('harga') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah_peserta">Jumlah Peserta</label>
                        <input type="number" class="form-control 
@error('jumlah_peserta') is-invalid @enderror" id="jumlah_peserta" onkeyup="hitung()" placeholder="Jumlah Peserta"
                            name="jumlah_peserta" value="{{$reservasi->jumlah_peserta   ?? old('jumlah_peserta')}}">
                        @error('jumlah_peserta') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="diskon">Diskon %</label>
                        <input type="decimal" class="form-control 
@error('diskon') is-invalid @enderror" id="diskon" onkeyup="hitung()" placeholder="Diskon" name="diskon"
                            value="{{$reservasi->diskon   ?? old('diskon')}}" readonly>
                        @error('diskon') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nilai_diskon">Nilai Diskon</label>
                        <input type="number" class="form-control 
@error('nilai_diskon') is-invalid @enderror" id="nilai_diskon" readonly placeholder="Nilai Diskon" name="nilai_diskon"
                            value="{{$reservasi->nilai_diskon   ?? old('nilai_diskon')}}">
                        @error('nilai_diskon') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="total_bayar">Total Bayar</label>
                        <input type="number" class="form-control 
@error('total_bayar') is-invalid @enderror" id="total_bayar" readonly placeholder="Total Bayar" name="total_bayar"
                            value="{{$reservasi->total_bayar   ?? old('total_bayar')}}">
                        @error('total_bayar') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="file_bukti_tf">Bukti Transfer</label>
                        <input type="hidden" name="oldfoto1" value="{{ $reservasi->file_bukti_tf }}">
                        <img src="{{ asset('storage/' . $reservasi->file_bukti_tf) }}"class="img-thumbnail d-block border-0" name="tampil" width="15%" id="tampil">
                        <input type="file" class="form-control 
@error('file_bukti_tf') is-invalid @enderror" id="file_bukti_tf" placeholder="Masukan Bukti Transfer Anda"
                            name="file_bukti_tf" value="{{old('file_bukti_tf')}}">
                        @error('file_bukti_tf') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputlevel">Status Reservasi</label>
                        <select class="form-control @error('status_reservasi_wisata') isinvalid @enderror"
                            id="exampleInputlevel" name="status_reservasi_wisata">
                            <option value="pesan" @if($reservasi->status_reservasi_wisata =='pesan' || old('status_reservasi_wisata')=='pesan' )selected @endif>Pesan
                            </option>
                            <option value="bayar" @if($reservasi->status_reservasi_wisata =='bayar' || old('status_reservasi_wisata')=='bayar' )selected @endif>Bayar
                            </option>
                            <option value="selesai" @if($reservasi->status_reservasi_wisata =='selesai' || old('status_reservasi_wisata')=='selesai' )selected @endif>
                                Selesai</option>
                        </select>
                        @error('status_reservasi_wisata') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <!--  Modal Pelanggan -->
                    <div class="modal fade" id="staticBackdrop" data-bsbackdrop="static" data-bs-keyboard="false"
                        tabindex="-1" arialabelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Pelanggan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <table class="table table-hover table-bordered tablestripped" id="example2">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Pelanggan</th>
                                                <th>No Telepon</th>
                                                <th>Alamat</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pelanggan as $key => $p)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td id={{$key+1}}>{{$p->nama_lengkap}}</td>
                                                <td>{{$p->no_hp}}</td>
                                                <td>{{$p->alamat}}</td>
                                                <td>
                                                    <button type="button" class="btn  btn-primary btn-xs"
                                                        onclick="pilih('{{$p->id}}',  '{{$p->nama_lengkap}}', '{{$p->no_hp}}', '{{$p->alamat}}')"
                                                        data-bs-dismiss="modal">
                                                        Pilih
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  Modal  -->
                    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Daftar Wisata
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <table class="table table-hover table-bordered tablestripped" id="example3">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Paket</th>
                                                <th>Harga</th>
                                                <th>Diskon</th>

                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($paketwisata as $key => $dp)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td id={{$key+1}}>{{$dp->nama_paket}}</td>
                                                <td>{{$dp->formatRupiah('harga_per_pack')}}</td>
                                                <td id={{$key+1}}>{{$dp->diskon}}%</td>

                                                <td>
                                                    <button type="button" class="btn  btn-primary 
    btn-xs" onclick="pilih1('{{$dp->id}}',  '{{$dp->nama_paket}}',  '{{$dp->harga_per_pack}}',  '{{$dp->diskon}}')"
                                                        data-bs-dismiss="modal">
                                                        Pilih
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('reservasi.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop
    @push('js')
    <script>
    $('#example2').DataTable({
        "responsive": true,
    });
    //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Users dari Modal ke form tambah
    function pilih(id, p) {
        document.getElementById('id_pelanggan').value = id
        document.getElementById('nama_lengkap').value = p
    }
    $('#example3').DataTable({
        "responsive": true,
    });
    //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data daftarpaket dari Modal ke form tambah
    function pilih1(id, dp, hrg, dsk) {
        document.getElementById('id_paket').value = id
        document.getElementById('nama_paket').value = dp
        document.getElementById('harga').value = hrg
        document.getElementById('diskon').value = dsk


    }
    </script>
    <script>
    function hitung() {
        let harga = document.getElementById("harga").value
        let diskon = document.getElementById("diskon").value
        let jumlah_peserta = document.getElementById("jumlah_peserta").value

        let nilai_diskon = harga * jumlah_peserta * diskon / 100
        document.getElementById("nilai_diskon").value = nilai_diskon
        let total_bayar = jumlah_peserta * harga - nilai_diskon
        document.getElementById("total_bayar").value = total_bayar

        //alert("qty = " + qty + " harga = " + harga)
    }
    </script>
    <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#tampil').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#file_bukti_tf").change(function() {
        readURL(this);
    });
    </script>
    <script>
    $(function() {
        $("#date").datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
    </script>
    @endpush