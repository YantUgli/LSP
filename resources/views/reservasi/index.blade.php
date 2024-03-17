@extends('adminlte::page')
@section('title', 'List Reservasi')
@section('content_header')
<h1 class="m-0 text-dark">List Reservasi</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('reservasi.create')}}" class="btn btn-success mb-2">
                    Tambah
                </a>
                {{-- <a href="{{route('cetak')}}" target="_blank" class="btn btn-info mb-2">
                    Cetak
                </a> --}}
                <table class="table table-hover table-bordered
table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama pelanggan</th>
                            <th>Nama Paket</th>
                            <th>Tanggal</th>
                            <th>Jumlah Peserta</th>
                            <th>Harga</th>
                            <th>Diskon</th>
                            <th>Nilai Diskon</th>
                            <th>Total</th>
                            <th>Bukti</th>
                            <th>Status</th>

                            <th>opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservasi as $key => $obyek)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td id={{$key+1}}>{{$obyek->pelanggan->nama_lengkap}}</td>
                            <td>{{$obyek->paketwisata->nama_paket}}</td>
                            <td>{{$obyek->tgl_reservasi_wisata}}</td>
                            <td>{{$obyek->jumlah_peserta}}</td>
                            <td>{{$obyek->formatRupiah('harga')}}</td>
                            <td>{{$obyek->diskon}}%</td>
                            <td>{{ $obyek->formatRupiah('nilai_diskon')}}</td>                           
                            <td>{{$obyek->formatRupiah('total_bayar')}}</td>
                            <td><img src="storage/{{$obyek->file_bukti_tf}}" alt="{{$obyek->file_bukti_tf}} tidak tampil"
                                class="img-thumbnail" style="width: 100px"></td>
                            <td>{{$obyek->status_reservasi_wisata}}</td>
                            
                            
                            <td>
                                <a href="{{route('reservasi.edit',
$obyek)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('reservasi.destroy',
$obyek)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@push('js')
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script>
    $('#example2').DataTable({
        "responsive": true,
    });

    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus data ? ')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }
</script>
@endpush