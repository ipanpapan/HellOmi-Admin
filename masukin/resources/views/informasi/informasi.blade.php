@extends('layouts.master')
    @section('title')
        Informasi
    @endsection
    @section('informasi') class="active" @endsection
    

    @section('konten')

        <div class="row x_title">
            <div class="col-md-6 col-sm-6 col-xs-6">
              <h3>Informasi</h3>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
               <div class="title_right">
                    <div class="col-md-2 pull-right">
                        <div class="input-group">
                            <a  href="{{ url('/informasi/tambah') }}" class="btn btn-success btn-sm">+ | Tambah</a>
                        </div>
                    </div>
                </div>
            </div>
          </div>

       
            
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_content">
                    <div class="row">
                        @foreach ($informasi as $informasi)    
                            <div class="col-md-55">
                                <div class="thumbnail">
                                    <div class="image view view-first">
                                        <img style="width: 100%; display: block;" src="{{ $informasi->gambar_informasi }}" alt="image" />
                                        <div class="mask">
                                            <p>{{ $informasi->judul_informasi }}</p>
                                            <div class="tools tools-bottom">
                                                <a href="{{ url('/informasi', $informasi->id_informasi) }}"><i class="fa fa-link"></i></a>
                                                <a href="{{ url('/informasi/edit', $informasi->id_informasi) }}"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ url('/informasi/delete', $informasi->id_informasi) }}"><i class="fa fa-close"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <p> <?=str_replace("\\n", "<br>", $informasi->isipendek_informasi)?> </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    @endsection