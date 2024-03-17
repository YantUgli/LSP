@extends('adminlte::page')
@section('title', 'List Karyawan')
@section('content_header')
    <h1 class="m-0 text-dark">List Karyawan</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('karyawan.create')}}" class="btn btn-success mb-2">
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
                            <th>Jabatan</th>
                            <th>id user</th>
                            <th>opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($karyawan as $key => $karyawan)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$karyawan->nama_karyawan}}</td>
                                <td>{{$karyawan->alamat}}</td>
                                <td>{{$karyawan->no_hp}}</td>
                                <td>{{$karyawan->jabatan}}</td>
                                <td>{{$karyawan->user->email}}</td>
                                <td>
                                    <a href="{{route('karyawan.edit',
$karyawan)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
<a href="{{route('karyawan.destroy',
$karyawan)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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

{{-- 
@extends('adminlte::page')
@section('title', 'List User')
@section('content_header')
    <h1 class="m-0 text-dark">List User</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('users.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered
table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Nomor Telepon</th>
                            <th>Jabatan</th>
                            <th>Id User</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($karyawan as $key => $karyawan)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$karyawan->nama_karyawan}}</td>
                                <td>{{$karyawan->alamat}}</td>
                                <td>{{$karyawan->no_hp}}</td>
                                <td>{{$karyawan->jabatan}}</td>
                                <td>{{$karyawan->user->email}}</td>
<td>
                                    <a href="{{route('users.edit',
$karyawan)}}" class="btn btn-primary btn-xs">
                                        Editkaryawan
                                    </a>
<a href="{{route('users.destroy',
$karyawan)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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
@endpush --}}