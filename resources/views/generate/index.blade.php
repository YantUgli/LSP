@extends('adminlte::page')
@section('title', 'Generate Laporan')
@section('content_header')
<h1 class="m-0 text-dark">Generate Laporan</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div >
            <div >
                
                <a href="{{route('cetak')}}" target="_blank" class="btn btn-info mb-2">
                    Klik Untuk Cetak Laporan Reservasi
                </a>
               
            </div>
        </div>
    </div>
</div>
@stop
@push('js')

@endpush