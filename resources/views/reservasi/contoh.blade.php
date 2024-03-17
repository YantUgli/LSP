{{-- @extends('adminlte::page')
@section('title', 'Tambah Reservasi')
@section('content_header')<h1 class="m-0 text-dark">Tambah Reservasi</h1>
@stop
@section('content')
<form action="{{route('reservasi.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                    <div class="form-group">
                        <label for="id_pelanggan">Id Pelanggan</label>
                        <div class="input-group">
                            <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="{{old('id_pelanggan')}}">
                            <input type="text" class="form-control 
@error('nama_lengkap') is-invalid @enderror" placeholder="Temukan id Pelanggan" id="nama_lengkap" name="nama_lengkap" value="{{old('nama_lengkap')}}"
                                aria-label="user" aria-describedby="cari" readonly>

                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop"></i>
                                Cari Data Id Pelanggan</button>

                        </div>
                        @error('id_pelanggan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>


                    <div class="form-group">
                        <label for="id_paket">Id Paket</label>
                        <div class="input-group">
                            <input type="hidden" name="id_paket" id="id_paket" value="{{old('id_paket')}}">
                            <input type="text" class="form-control 
@error('nama_paket') is-invalid @enderror" placeholder="Temukan id Pelanggan" id="nama_paket" name="nama_paket" value="{{old('nama_paket')}}"
                                aria-label="user" aria-describedby="cari" readonly>

                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop1"></i>
                                Cari Data Id Paket</button>

                        </div>
                        @error('id_paket') <span class="text-danger">{{$message}}</span> @enderror
                    </div>




                    <div class="form-group">
                        <label for="tgl_reservasi_wisata">Tanggal Reservasi</label>
                        <input type="datetime-local" class="form-control 
@error('tgl_reservasi_wisata') is-invalid @enderror" id="tgl_reservasi_wisata" placeholder="Masukan Tanggal" name="tgl_reservasi_wisata" value="{{old('tgl_reservasi_wisata')}}" >
                        @error('tgl_reservasi_wisata') <span class="text-danger">{{$message}}</span> @enderror
                    </div>



                    <div class="form-group">
                        <label for="harga">Harga</label>
                       
                        <input type="number" class="form-control 
@error('harga') is-invalid @enderror" id="harga" placeholder="Masukan Harga" name="harga"
                            value="{{old('harga')}}">
                        @error('harga') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="jumlah_peserta">Jumlah Peserta</label>
                        <input type="number" class="form-control 
@error('jumlah_peserta') is-invalid @enderror" id="jumlah_peserta" placeholder="Masukan Nomor" name="jumlah_peserta" value="{{old('jumlah_peserta')}}">
                        @error('jumlah_peserta') <span class="text-danger">{{$message}}</span> @enderror
                    </div>



                    <div class="form-group">
                        <label for="diskon">Diskon</label>
                        <input type="number" class="form-control 
@error('diskon') is-invalid @enderror" id="diskon" placeholder="Masukan Nomor" name="diskon" value="{{old('diskon')}}">
                        @error('diskon') <span class="text-danger">{{$message}}</span> @enderror
                    </div>



                    <div class="form-group">
                        <label for="nilai_diskon">Nilai Diskon</label>
                        <input type="number" class="form-control 
@error('nilai_diskon') is-invalid @enderror" id="nilai_diskon" placeholder="Masukan Nomor" name="nilai_diskon" value="{{old('nilai_diskon')}}">
                        @error('nilai_diskon') <span class="text-danger">{{$message}}</span> @enderror
                    </div>


                    <div class="form-group">
                        <label for="total_bayar">Total Bayar</label>
                        <input type="number" class="form-control 
@error('total_bayar') is-invalid @enderror" id="total_bayar" placeholder="Masukan Nomor" name="total_bayar" value="{{old('total_bayar')}}">
                        @error('total_bayar') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="file_bukti_tf">Bukti Transfer</label>
                        <img  class="img-thumbnail d-block border-0" name="tampil" width="15%" id="tampil">
                        <input type="file" class="form-control 
@error('file_bukti_tf') is-invalid @enderror" id="file_bukti_tf" placeholder="Masukan Bukti Transfer Anda" name="file_bukti_tf" value="{{old('file_bukti_tf')}}">
                        @error('file_bukti_tf') <span class="text-danger">{{$message}}</span> @enderror
                    </div>


                    <div class="form-group">
                        <label for="exampleInputlevel">Status Reservasi</label>
                        <select class="form-control @error('status_reservasi_wisata') isinvalid @enderror" id="exampleInputlevel" name="status_reservasi_wisata">
                            <option value="pesan" @if(old('status_reservasi_wisata')=='pesan' )selected @endif>Pesan
                            </option>
                            <option value="dibayar" @if(old('status_reservasi_wisata')=='dibayar' )selected @endif>Dibayar</option>
                            <option value="selesai" @if(old('status_reservasi_wisata')=='selesai' )selected @endif>Selesai</option>
                        </select>
                        @error('status_reservasi_wisata') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                       
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('pelanggan.index')}}" class="btn btn-danger">
                        Batal
                    </a></div>
            </div>
        </div>
    </div>
    <!-- Modal pelanggan -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Id Pelanggan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Lengkap</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pelanggan as $key => $user)
                            <tr>
                                <td>{{$key+1}}</td>

                                <td>{{$user->nama_lengkap}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary 
btn-xs" onclick="pilih('{{$user->id}}', '{{$user->nama_lengkap}}')" data-bs-dismiss="modal">
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



 <!-- Modal Paket -->
 <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
 aria-labelledby="staticBackdropLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
     <div class="modal-content">
         <div class="modal-header">
             <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Id Paket</h1>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">

             <table class="table table-hover table-bordered table-stripped" id="example2">
                 <thead>
                     <tr>
                         <th>No.</th>
                         <th>Nama Paket</th>
                         <th>Harga</th>
                         <th>Opsi</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach($paketwisata as $key => $user)
                     <tr>
                         <td>{{$key+1}}</td>

                         <td>{{$user->nama_paket}}</td>
                         <td>{{ $user->harga_per_pack }}</td>
                         <td>
                             <button type="button" class="btn btn-primary 
btn-xs" onclick="pilih1('{{$user->id}}', '{{$user->nama_paket}}', '{{$user->harga_per_pack}}')" data-bs-dismiss="modal">
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
        function pilih(id, nama_lengkap) {
            document.getElementById('id_pelanggan').value = id
            document.getElementById('nama_lengkap').value = nama_lengkap
        }


        function pilih1(id, nama_paket, harga_per_pack) {
            document.getElementById('id_paket').value = id
            document.getElementById('nama_paket').value = nama_paket
            document,getElementById('harga_per_pack').value = harga_per_pack
        }


        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#tampil').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#file_bukti_tf").change(function () {
            readURL(this);
        });


    </script>
    @endpush



    --}}