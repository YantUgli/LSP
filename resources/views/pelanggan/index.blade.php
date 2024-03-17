@extends('adminlte::page')
@section('title', 'List Pelanggan')
@section('content_header')
    <h1 class="m-0 text-dark">List Pelanggan</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('pelanggan.create')}}" class="btn btn-success mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered
table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Foto</th>
                            <th>id user</th>
                            <th>opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pelanggan as $key => $pelanggan)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$pelanggan->nama_lengkap}}</td>
                                <td>{{$pelanggan->alamat}}</td>
                                <td>{{$pelanggan->no_hp}}</td>
                                <td><img src="storage/{{$pelanggan->foto}}" alt="{{$pelanggan->foto}} tidak tampil"
                                    class="img-thumbnail" style="width: 100px"></td>
                                <td>{{$pelanggan->user->email}}</td>
                                <td>
                                    <a href="{{route('pelanggan.edit',
$pelanggan)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
<a href="{{route('pelanggan.destroy',
$pelanggan)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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

