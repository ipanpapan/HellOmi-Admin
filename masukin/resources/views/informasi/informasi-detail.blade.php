@extends('layouts.master')
    @section('title')
        Informasi
    @endsection
    @section('informasi') class="active" @endsection
    @section('konten')
        <div class="row x_title">
            <div class="col-md-6 col-sm-6 col-xs-6">
              <h3>{{ $informasi->subjek_informasi }}</h3>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
               <div class="title_right">
                    <div class="col-md-2 pull-right">
                        <div class="input-group">
                            <a href="{{ url('/informasi/edit', $informasi->id_informasi) }}" class="btn btn-success btn-sm" ><i class="fa fa-pencil"> | Edit</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

             
        <div class="x_title">
            <h2>{{ $informasi->judul_informasi }}</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="col-md-4-6" align="center">
                <img src="{{ URL::to($informasi->gambar_informasi) }}">
                <br><br>
                <p align="left">
                    <?=str_replace("\\n", "<br>", $informasi->isipanjang_informasi)?>
                </p>
            </div>
        </div>

    @endsection