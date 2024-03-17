@extends('adminlte::page')
@section('title', 'List Kategori Wisata')
@section('content_header')
<h1 class="m-0 text-dark">List Kategori Wisata</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('kategoriwisata.create')}}" class="btn 
btn-success mb-2">
                    Tambah
                </a>
                <table class="table table-hover table-bordered 
table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            {{-- <th>Id Kategori</th> --}}
                            <th>Kategori wisata</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategoriwisata as $key => $bs)
                        <tr>
                            <td>{{$key+1}}</td>
                            {{-- <td>{{$bs->id}}</td> --}}
                            <td>{{$bs->kategori_wisata}}</td>
                            <td>
                                <a href="{{route('kategoriwisata.edit', 
$bs)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('kategoriwisata.destroy', 
$bs)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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