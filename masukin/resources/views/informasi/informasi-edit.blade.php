@extends('layouts.master')
	@section('title')
		Tambah Informasi
	@endsection
	@section('informasi') class="active" @endsection
	@section('konten')
		<div class="row x_title">
            <div class="col-md-6 col-sm-6 col-xs-6">
              <h3>Edit Informasi</h3>
            </div>
         </div>
        <div class="clearfix"></div>
        {!! Form::open(array('url'=>'informasi/update', 'role'=>'form', 'files'=>true, 'class="form-horizontal form-label-left"')) !!}
        	<input type="hidden" name="id_informasi" value="{{$informasi->id_informasi}}">
        	<div class="form-group">
        		<label class="col-md-2 control-label">Kategori informasi</label>
	        	<div class="col-md-6">
	        		<select name="judul-informasi" class="form-control">
	        			<option value="omi">OMI</option>
	        			<option value="aerobik" @if($informasi->judul_informasi == "aerobik") selected @endif >Aerobik</option>
	        			<option value="basket putra" @if($informasi->judul_informasi == "basket putra") selected @endif >Basket</option>
	        			<option value="catur" @if($informasi->judul_informasi == "catur") selected @endif >Catur</option>
	        			<option value="estafet putra" @if($informasi->judul_informasi == "estafet putra") selected @endif >Estafet</option>
	        			<option value="futsal putra" @if($informasi->judul_informasi == "futsal putra") selected @endif >Futsal</option>
	        			<option value="lompat jauh putra" @if($informasi->judul_informasi == "lompat jauh putra") selected @endif >Lompat Jauh</option>
	        			<option value="marathon putra" @if($informasi->judul_informasi == "marathon putra") selected @endif >Marathon</option>
	        			<option value="renang" @if($informasi->judul_informasi == "renang") selected @endif >Renang</option>
	        			<option value="sepakbola" @if($informasi->judul_informasi == "sepakbola") selected @endif >Sepakbola</option>
	        			<option value="sprint putra" @if($informasi->judul_informasi == "sprint putra") selected @endif >Sprint Putra</option>
	        			<option value="tenis lapang" @if($informasi->judul_informasi == "tenis lapang") selected @endif >Tenis Lapang</option>
	        			<option value="tenis meja putra" @if($informasi->judul_informasi == "tenis meja putra") selected @endif >Tenis Meja</option>
	        			<option value="volly putra" @if($informasi->judul_informasi == "volly putra") selected @endif >Voli</option>
	        		</select>
		        	@if($errors->has('judul-informasi'))
		        		{!! $errors->first('judul-informasi') !!}
		        	@endif
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label">Judul Informasi</label>
        		<div class="col-md-6">
	        		<input type="text" class="form-control" name="subjek-informasi" value="{{$informasi->subjek_informasi}}" required>
			        	@if($errors->has('subjek-informasi'))
			        		{!! $errors->first('subjek-informasi') !!}
			        	@endif
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label">Isi Informasi</label>
        		<div class="col-md-6">
	        		<textarea name="isi-informasi" class="resizable_textarea form-control" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" class="form-control" required>{{$informasi->isipanjang_informasi}}</textarea>
			        	@if($errors->has('isi-informasi'))
			        		{!! $errors->first('isi-informasi') !!}
			        	@endif
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
				<label class="col-md-2 control-label">Image</label>
				<div class="col-md-6">
					<input type="file" name="image">
						@if($errors->has('image'))
				        	{!! $errors->first('image') !!}
			        	@endif 
			    </div>       		
        	</div>
        	<div class="clearfix"></div>
    	 	<div class="col-md-4">
    	 		<a href="{{url('informasi')}}"><button class="btn btn-primary btn-sm" >Batalkan</button></a>
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