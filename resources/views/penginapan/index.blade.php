@extends('adminlte::page')
@section('title', 'List Penginapan')
@section('content_header')
<h1 class="m-0 text-dark">List Penginapan</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('penginapan.create')}}" class="btn btn-success mb-2">
                    Tambah
                </a>
                <table class="table table-hover table-bordered
table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Penginapan</th>
                            <th>Deskripsi</th>
                            <th>Fasilitas</th>
                            <th>Foto 1</th>
                            <th>Foto 2</th>
                            <th>Foto 3</th>
                            <th>Foto 4</th>
                            <th>Foto 5</th>

                            <th>opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penginapan as $key => $penginapan)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td id={{$key+1}}>{{$penginapan->nama_penginapan}}</td>
                            <td>{{$penginapan->deskripsi}}</td>
                           
                            <td>{{$penginapan->fasilitas}}</td>

                            <td><img src="storage/{{$penginapan->foto1}}" alt="{{$penginapan->foto1}} tidak tampil"
                                    class="img-thumbnail" style="width: 100px"></td>
                          
                            <td><img src="storage/{{$penginapan->foto2}}" alt="{{$penginapan->foto2}} tidak tampil"
                                    class="img-thumbnail" style="width: 100px"></td>
                          
                            <td><img src="storage/{{$penginapan->foto3}}" alt="{{$penginapan->foto3}} tidak tampil"
                                    class="img-thumbnail" style="width: 100px"></td>
                          
                            <td><img src="storage/{{$penginapan->foto4}}" alt="{{$penginapan->foto4}} tidak tampil"
                                    class="img-thumbnail" style="width: 100px"></td>
                            

                            <td><img src="storage/{{$penginapan->foto5}}" alt="{{$penginapan->foto5}} tidak tampil"
                                    class="img-thumbnail" style="width: 100px"></td>
                            <td>
                                <a href="{{route('penginapan.edit',
$penginapan)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('penginapan.destroy',
$penginapan)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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