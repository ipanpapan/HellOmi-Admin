@extends('layouts.master')
	@section('title')
		Tambah Informasi
	@endsection
	@section('informasi') class="active" @endsection
	@section('konten')
		<div class="row x_title">
            <div class="col-md-6 col-sm-6 col-xs-6">
              <h3>Tambah Informasi</h3>
            </div>
         </div>
         <div class="clearfix"></div>
        {!! Form::open(array('url'=>'informasi/post', 'role'=>'form', 'files'=>true, 'class="form-horizontal form-label-left"')) !!}
        	<div class="form-group">
        		<label class="col-md-2 control-label">Kategori informasi</label>
	        	<div class="col-md-6">
	        		<select name="judul-informasi" class="form-control">
	        			<option value="omi">OMI</option>
	        			<option value="aerobik">Aerobik</option>
	        			<option value="basket putra">Basket</option>
	        			<option value="catur">Catur</option>
	        			<option value="estafet putra">Estafet</option>
	        			<option value="futsal putra">Futsal</option>
	        			<option value="lompat jauh putra">Lompat Jauh</option>
	        			<option value="marathon putra">Marathon</option>
	        			<option value="renang">Renang</option>
	        			<option value="sepakbola">Sepakbola</option>
	        			<option value="sprint putra">Sprint Putra</option>
	        			<option value="tenis lapang">Tenis Lapang</option>
	        			<option value="tenis meja putra">Tenis Meja</option>
	        			<option value="volly putra">Voli</option>
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
	        		<input type="text" class="form-control" name="subjek-informasi" required>
			        	@if($errors->has('subjek-informasi'))
			        		{!! $errors->first('subjek-informasi') !!}
			        	@endif
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label">Isi Informasi</label>
        		<div class="col-md-6">
	        		<textarea name="isi-informasi" class="resizable_textarea form-control" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" class="form-control" required></textarea>
			        	@if($errors->has('isi-informasi'))
			        		{!! $errors->first('isi-informasi') !!}
			        	@endif
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
				<label class="col-md-2 control-label">Image</label>
				<div class="col-md-6">
					<input type="file" name="image" required>
						@if($errors->has('isi-informasi'))
				        	{!! $errors->first('isi-informasi') !!}
			        	@endif 
			    </div>       		
        	</div>
        	<div class="clearfix"></div>
    	 	<div class="col-md-4">
        		<button type="submit" class="btn btn-success btn-sm" >Submit</button>
        	</div>
        {!! Form::close() !!}

    @endsection

    @section('js')
    <script src="{{ asset('assets/js/textarea/autosize.min.js') }}"></script>
  <script>
    autosize($('.resizable_textarea'));
  </script>
  @endsection