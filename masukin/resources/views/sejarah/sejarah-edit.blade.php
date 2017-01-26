@extends('layouts.master')
	@section('title')
		Edit Sejarah
	@endsection
	@section('sejarah') class="active" @endsection
	@section('konten')
		<div class="row x_title">
            <div class="col-md-6 col-sm-6 col-xs-6">
              <h3>Edit Sejarah</h3>
            </div>
         </div>
        <div class="clearfix"></div>
        {!! Form::open(array('url'=>'sejarah/update', 'role'=>'form', 'class="form-horizontal form-label-left"')) !!}
        	<input type="hidden" name="id_sejarah" value="{{$sejarah->id_sejarah}}">
        	
        	<div class="form-group">
        		<label class="col-md-2 control-label">Fakultas</label>
        		<div class="col-md-6">
	        		<input type="text" class="form-control" name="fakultas" value="{{$sejarah->nama_fakultas}}" disabled="">
			    </div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label">Nama Suporter</label>
        		<div class="col-md-6">
	        		<input type="text" class="form-control" name="nama_suporter" value="{{$sejarah->suporter_fakultas}}" >
			    </div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label">Sejarah</label>
        		<div class="col-md-6">
	        		<textarea name="sejarah_lengkap" class="resizable_textarea form-control" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" class="form-control" required>{!! nl2br("$sejarah->sejarah_lengkap") !!}</textarea>
	        	</div>
        	</div>
    	 	<div class="col-md-4">
    	 		<a href="{{back()}}"><button class="btn btn-primary btn-sm" >Batalkan</button></a>
        		<button type="submit" class="btn btn-success btn-sm" >Update</button>
        		
        	</div>
        {!! Form::close() !!}
    @endsection

    @section('js')
    <script src="{{ asset('assets/js/textarea/autosize.min.js') }}"></script>
  <script>
    autosize($('.resizable_textarea'));
  </script>
  @endsection