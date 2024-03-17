@extends('adminlte::page')
@section('title', 'List Obyek Wisata')
@section('content_header')
<h1 class="m-0 text-dark">List Obyek Wisata</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('obyekwisata.create')}}" class="btn btn-success mb-2">
                    Tambah
                </a>
                
                <table class="table table-hover table-bordered
table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Wisata</th>
                            <th>Deskripsi Wisata</th>
                            <th>Kategori Wisata</th>
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
                        @foreach($obyekwisata as $key => $obyek)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td id={{$key+1}}>{{$obyek->nama_wisata}}</td>
                            <td>{{$obyek->deskripsi_wisata}}</td>
                            <td>{{$obyek->kategoriwisata->kategori_wisata}}</td>
                            <td>{{$obyek->fasilitas}}</td>

                            <td><img src="storage/{{$obyek->foto1}}" alt="{{$obyek->foto1}} tidak tampil"
                                    class="img-thumbnail" style="width: 100px"></td>
                          
                            <td><img src="storage/{{$obyek->foto2}}" alt="{{$obyek->foto2}} tidak tampil"
                                    class="img-thumbnail" style="width: 100px"></td>
                          
                            <td><img src="storage/{{$obyek->foto3}}" alt="{{$obyek->foto3}} tidak tampil"
                                    class="img-thumbnail" style="width: 100px"></td>
                          
                            <td><img src="storage/{{$obyek->foto4}}" alt="{{$obyek->foto4}} tidak tampil"
                                    class="img-thumbnail" style="width: 100px"></td>
                            

                            <td><img src="storage/{{$obyek->foto5}}" alt="{{$obyek->foto5}} tidak tampil"
                                    class="img-thumbnail" style="width: 100px"></td>
                            <td>
                                <a href="{{route('obyekwisata.edit',
$obyek)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('obyekwisata.destroy',
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