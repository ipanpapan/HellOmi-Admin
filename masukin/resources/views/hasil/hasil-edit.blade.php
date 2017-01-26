@extends('layouts.master')
	@section('title')
		Edit Hasil
	@endsection
	@section('cabor') class="active" @endsection
	@section('konten')
    <?php function fakultasName($id){if($id==='A'){echo "FAPERTA";}elseif($id === 'B'){echo "FKH";}elseif($id==='C'){echo "FPIK";}elseif($id==='D'){echo "FAPET";}elseif($id==='E'){echo "FAHUTAN";}elseif($id==='F'){echo "FATETA";}elseif($id==='G'){echo "FMIPA";}elseif($id==='H'){echo "FEM";}elseif($id==='I'){echo "FEMA";}elseif($id==='J'){echo "DIPLOMA";}elseif($id==='P'){echo "PPKU";}}?>                                    
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Hasil Pertandingan</h3>
                <h4>{{$jadwal->nama_cabor}}</h4>
                <h4>@if($jadwal->fakultasB==true)<?=fakultasName($jadwal->fakultasA)?> VS <?=fakultasName($jadwal->fakultasB)?> @endif
                    @if($jadwal->fakultasC==true) VS <?=fakultasName($jadwal->fakultasC)?> @endif
                    @if($jadwal->fakultasD==true) VS <?=fakultasName($jadwal->fakultasD)?> @endif
                </h4>
            </div>
        </div>
        <div class="clearfix"></div>
        {!! Form::open(array('url'=>'hasil/update', 'role'=>'form')) !!}
            <input type="hidden" name="idHasil" value="{{$hasil->id_hasil}}">
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label">Hasil Fakultas A</label>
        		<div class="col-md-6">
	        		<input type="text" class="form-control" name="hasilA" value="{{$hasil->resultA}}">
			        	@if($errors->has('hasilA'))
			        		{!! $errors->first('hasilA') !!}
			        	@endif
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label">Hasil Fakultas B</label>
        		<div class="col-md-6">
	        		<input type="text" class="form-control" name="hasilB" value="{{$hasil->resultB}}">
			        	@if($errors->has('hasilB'))
			        		{!! $errors->first('hasilB') !!}
			        	@endif
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
				<label class="col-md-2 control-label">Detail</label>
				<div class="col-md-6">
					<textarea name="detail" class="form-control">{{$hasil->detail}}</textarea>
						@if($errors->has('detail'))
				        	{!! $errors->first('detail') !!}
			        	@endif 
			    </div>       		
        	</div>
        	<div class="clearfix"></div>
    	 	<div class="col-md-4">
        		<button type="submit" class="btn btn-success btn-sm" >Submit</button>
        	</div>
        {!! Form::close() !!}

    @endsection