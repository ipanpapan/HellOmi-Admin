@extends('layouts.master')
    @section('title')
        Jadwal
    @endsection
    
@section('konten')


        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Knockout </h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          @foreach($data as $data)
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>{{$data->nama_cabor}}</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  
                  <div class="col-md-6 col-sm-6 col-xs-12">
                  {!! Form::open(array('url'=>'knockout/update', 'role'=>'form', 'files'=>true, 'class="form-horizontal form-label-left"')) !!}
                  <input type="hidden" name="id" value="{{$data->id}}">
                  <div class="form-group">
                    <label class="col-md-2 control-label">Babak</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="babak" value="{{$data->babak}}" required>
                        @if($errors->has('babak'))
                          {!! $errors->first('babak') !!}
                        @endif
                    </div>
                  </div>
                  <div class="clearfix"></div>
                    <div class="form-group">
                  <label class="col-md-2 control-label">Image</label>
                  <div class="col-md-6">
                    <input type="file" name="image" required>
                      @if($errors->has('gambar'))
                            {!! $errors->first('gambar') !!}
                          @endif 
                    </div>          
                    </div>
                    <div class="clearfix"></div>
                  <div class="col-md-4">
                      <button type="submit" class="btn btn-success btn-sm" >Save</button>
                    </div>
                  {!! Form::close() !!}
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <img style="width: 100%; display: block;" src="{{ $data->gambar }}" alt="image" />
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
      </div>

@endsection

@section('js')
<script src="{{ asset('assets/js/dropzone/dropzone.js') }}"></script>
@endsection