@extends('layouts.master')
	@section('title')
		Edit Jadwal
	@endsection
    @section('cabor') class="active" @endsection
	@section('konten')
        <div class="row x_title">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="title_left">
                    <h3>Edit Jadwal</h3>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        {!! Form::open(array('url'=>'jadwal/update', 'role'=>'form', 'class="form-horizontal form-label-left"')) !!}
            <input type="hidden" name="idPertandingan" value="{{$jadwal->id_pertandingan}}">
        	<div class="form-group">
        		<label class="col-md-2 control-label" align="right">Cabang Olahraga</label>
	        	<div class="col-md-6">
	        		<select class="form-control" id="sel1" name="cabangOlahraga">
                        <option value="0">Pilih Cabang Olahraga</option>
                        @foreach($cabor as $pilihan)   
                        <option value="{{$pilihan->id_cabor}}" @if($pilihan->id_cabor == $jadwal->id_cabor) selected @endif>{{$pilihan->nama_cabor}}</option>
                        @endforeach
                    </select>
		        	@if($errors->has('idCabang'))
		        		{!! $errors->first('idCabang') !!}
		        	@endif
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label" align="right">Tanggal Pertandingan</label>
        		<div class="col-md-6">
	        		<input type="date" class="form-control" name="tanggal" value="<?=date("d/m/Y", strtotime($jadwal->tanggal_pertandingan))?>">
			        	@if($errors->has('tanggal'))
			        		{!! $errors->first('tanggal') !!}
			        	@endif
	        	</div>
            </div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label" align="right">Waktu Pertandingan</label>
        		<div class="col-md-6">
	        		<input type="time" class="form-control" name="waktu" value="<?=date("h:i", strtotime($jadwal->tanggal_pertandingan))?>">
			        	@if($errors->has('waktu'))
			        		{!! $errors->first('waktu') !!}
			        	@endif
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label" align="right">Tempat Pertandingan</label>
        		<div class="col-md-6">
	        		<input type="text" name="tempat" class="form-control" value="{{$jadwal->tempat_pertandingan}}">
			        	@if($errors->has('tempat'))
			        		{!! $errors->first('tempat') !!}
			        	@endif
	        	</div>
        	</div>
            <div class="clearfix"></div>
            <div class="form-group">
                <label class="col-md-2 control-label" align="right">Babak Pertandingan</label>
                <div class="col-md-6">
                    <input type="text" name="babak" class="form-control" value="{{$jadwal->babak_pertandingan}}">
                        @if($errors->has('babak'))
                            {!! $errors->first('babak') !!}
                        @endif
                </div>
            </div>
        	<div class="clearfix"></div>

            <div class="form-group">
                <label class="col-md-2 control-label" align="right">Status pertandingan</label>
                <div class="col-md-6">
                    <p>
                      <input type="radio" class="flat" name="status" id="genderM" value="1" @if($jadwal->status==1) checked=""@endif required /> Sudah &nbsp
                      <input type="radio" class="flat" name="status" id="genderF" value="0" @if($jadwal->status==0) checked=""@endif/> Belum
                    </p>  
                </div>
            </div>
            <div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label" align="right">Fakultas A</label>
	        	<div class="col-md-6">
	        		<select class="form-control" id="sel1" name="fakultasA">
                        <option value="0">Pilih Fakultas</option>
                        @foreach($fakultas as $fakultasA)   
                        <option value="{{$fakultasA->id_fakultas}}" @if($fakultasA->id_fakultas==$jadwal->fakultasA) selected @endif>{{$fakultasA->nama_fakultas}}</option>
                        @endforeach
                    </select>
		        	
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label" align="right">Fakultas B</label>
	        	<div class="col-md-6">
	        		<select class="form-control" id="sel1" name="fakultasB">
                        <option value="0">Pilih Fakultas</option>
                        @foreach($fakultas as $fakultasB)   
                        <option value="{{$fakultasB->id_fakultas}}" @if($fakultasB->id_fakultas==$jadwal->fakultasB) selected @endif>{{$fakultasB->nama_fakultas}}</option>
                        @endforeach
                    </select>
		        	
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label"align="right">Fakultas C</label>
	        	<div class="col-md-6">
	        		<select class="form-control" id="sel1" name="fakultasC">
                        <option value="0">Pilih Fakultas</option>
                        @foreach($fakultas as $fakultasC)   
                        <option value="{{$fakultasC->id_fakultas}}" @if($fakultasC->id_fakultas==$jadwal->fakultasC) selected @endif>{{$fakultasC->nama_fakultas}}</option>
                        @endforeach
                    </select>
		        	
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label" align="right">Fakultas D</label>
	        	<div class="col-md-6">
	        		<select class="form-control" id="sel1" name="fakultasD">
                        <option value="0">Pilih Fakultas</option>
                        @foreach($fakultas as $fakultasD)   
                        <option value="{{$fakultasD->id_fakultas}}" @if($fakultasD->id_fakultas==$jadwal->fakultasD) selected @endif >{{$fakultasD->nama_fakultas}}</option>
                        @endforeach
                    </select>
		        	@if($errors->has('idCabang'))
		        		{!! $errors->first('idCabang') !!}
		        	@endif
	        	</div>
        	</div>
        	<div class="clearfix"></div>
    	 	<div class="col-md-4">
                <a href="{{url('/jadwal')}}"><button class="btn btn-primary btn-sm" >Batalkan</button></a>
        		<button type="submit" class="btn btn-success btn-sm" >Edit</button>
        	</div>
        {!! Form::close() !!}

   @endsection

   @section('js')
   <script src="{{ asset('assets/js/switchery/switchery.min.js') }}"></script>
   @endsection