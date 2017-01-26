@extends('layouts.master')
	@section('title')
		Tambah Informasi
	@endsection

	@section('konten')
        <div class="page-title">
            <div class="title_left">
                <h3>Tambah Informasi</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        {!! Form::open(array('url'=>'informasi/post', 'role'=>'form', 'files'=>true)) !!}
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
	        		<input type="text" class="form-control" name="subjek-informasi">
			        	@if($errors->has('subjek-informasi'))
			        		{!! $errors->first('subjek-informasi') !!}
			        	@endif
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label">Subjek Informasi</label>
        		<div class="col-md-6">
	        		<textarea name="isi-informasi" class="form-control"></textarea>
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