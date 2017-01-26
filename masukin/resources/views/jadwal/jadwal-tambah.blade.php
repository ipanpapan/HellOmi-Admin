@extends('layouts.master')
	@section('title')
		Tambah Jadwal
	@endsection
    @section('cabor') class="active" @endsection
	@section('konten')
        <div class="row x_title">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="title_left">
                    <h3>Tambah Jadwal</h3>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        {!! Form::open(array('url'=>'jadwal/post', 'role'=>'form', 'class="form-horizontal form-label-left"')) !!}
        	<div class="form-group">
        		<label class="col-md-2 control-label" align="right">Cabang Olahraga</label>
	        	<div class="col-md-6">
	        		<select class="form-control" name="cabangOlahraga">
                        <option value="0">Pilih Cabang Olahraga</option>
                        @foreach($cabor as $pilihan)   
                        <option value="{{$pilihan->id_cabor}}" >{{$pilihan->nama_cabor}}</option>
                        @endforeach
                    </select>
		        	@if($errors->has('cabangOlahraga'))
		        		{!! $errors->first('cabangOlahraga') !!}
		        	@endif
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label" align="right">Tanggal Pertandingan</label>
        		<div class="col-md-6">
	        		<input type="date" class="form-control" name="tanggal">
			        	@if($errors->has('tanggal'))
			        		{!! $errors->first('tanggal') !!}
			        	@endif
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label" align="right">Waktu Pertandingan</label>
        		<div class="col-md-6">
	        		<input type="time" class="form-control" name="waktu">
			        	@if($errors->has('waktu'))
			        		{!! $errors->first('waktu') !!}
			        	@endif
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label" align="right">Tempat Pertandingan</label>
        		<div class="col-md-6">
	        		<input type="text" name="tempat" id="form-tempat" class="form-control">
			        	@if($errors->has('tempat'))
			        		{!! $errors->first('tempat') !!}
			        	@endif
	        	</div>
        	</div>
            <div class="clearfix"></div>
            <div class="form-group">
                <label class="col-md-2 control-label" align="right">Babak Pertandingan</label>
                <div class="col-md-6">
                    <input type="text" name="babak" class="form-control">
                        @if($errors->has('babak'))
                            {!! $errors->first('babak') !!}
                        @endif
                </div>
            </div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label" align="right">Fakultas A</label>
	        	<div class="col-md-6">
	        		<select class="form-control" name="fakultasA">
                        <option value="0">Pilih Fakultas</option>
                        @foreach($fakultas as $fakultasA)   
                        <option value="{{$fakultasA->id_fakultas}}" >{{$fakultasA->nama_fakultas}}</option>
                        @endforeach
                    </select>
		        	@if($errors->has('fakultasA'))
                        {!! $errors->first('fakultasA') !!}
                    @endif
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label" align="right">Fakultas B</label>
	        	<div class="col-md-6">
	        		<select class="form-control" name="fakultasB">
                        <option value="0">Pilih Fakultas</option>
                        @foreach($fakultas as $fakultasB)   
                        <option value="{{$fakultasB->id_fakultas}}" >{{$fakultasB->nama_fakultas}}</option>
                        @endforeach
                    </select>
		        	@if($errors->has('fakultasB'))
                        {!! $errors->first('fakultasB') !!}
                    @endif
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label" align="right">Fakultas C</label>
	        	<div class="col-md-6">
	        		<select class="form-control" name="fakultasC">
                        <option value="0">Pilih Fakultas</option>
                        @foreach($fakultas as $fakultasC)   
                        <option value="{{$fakultasC->id_fakultas}}" >{{$fakultasC->nama_fakultas}}</option>
                        @endforeach
                    </select>
		        	@if($errors->has('fakultasC'))
                        {!! $errors->first('fakultasC') !!}
                    @endif
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label" align="right">Fakultas D</label>
	        	<div class="col-md-6">
	        		<select class="form-control" name="fakultasD">
                        <option value="0">Pilih Fakultas</option>
                        @foreach($fakultas as $fakultasD)   
                        <option value="{{$fakultasD->id_fakultas}}" >{{$fakultasD->nama_fakultas}}</option>
                        @endforeach
                    </select>
		        	@if($errors->has('fakultasD'))
		        		{!! $errors->first('fakultasD') !!}
		        	@endif
	        	</div>
        	</div>
        	<div class="clearfix"></div>
    	 	<div class="col-md-4">
        		<button type="submit" class="btn btn-success btn-sm" >Submit</button>
        	</div>
        {!! Form::close() !!}

    @endsection