@extends('layouts.master')
    @section('title')
        Medali
    @endsection

    @section('konten')
        <table class="tabel-perolehan">
            <tr>
                <th width="25%"></th>
                <th width="10%"><img src="{{ asset('assets/images/gold.png') }}" width="100%"></th>
                <th width="10%"><img src="{{ asset('assets/images/silver.png') }}" width="100%"></th>
                <th width="10%"><img src="{{ asset('assets/images/bronze.png') }}" width="100%"></th>
                <th width="20%"></th>
            </tr>
            @foreach($medali as $row)
            <tr>
                <td><img src="{{ asset('assets/images/fakultas/'.$row->id_fakultas.'.png') }}" width="35%"><h5>{{$row->nama_fakultas}}</h5></td>
                <td>{{$row->medali_emas}}</td>
                <td>{{$row->medali_perak}}</td>
                <td>{{$row->medali_perunggu}}</td>
                <td><a href="medali/{{$row->id_fakultas}}"><button type="button" class="btn btn-primary">Detail</button></p></td>
            </tr>
            @endforeach
        </table>
    @endsection