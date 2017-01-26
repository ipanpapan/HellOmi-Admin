@extends('layouts.master')
    @section('title')
        Medali Detail
    @endsection

    @section('konten')
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Medali Detail</h3>
                </div>
                <div class="title_right">
                    <div class="col-md-2 pull-right">
                        <div class="input-group">
                            <a href="{{ url('/medali/tambah', $medaliDetail->id_fakultas) }}" class="btn btn-success btn-sm" ><i class="fa fa-pencil"> Tambah </i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="x_content">
                <div class="col-md-2">
                    <img src="{{ asset('assets/images/fakultas/'.$medaliDetail->kode_fakultas.'.png') }}" width="75%">
                </div>
                <div class="col-md-4">
                    <h3>{{$medaliDetail->nama_fakultas}}</h3>
                </div>
                <div class="">
                    
                </div>
            </div>
        </div>
    @endsection