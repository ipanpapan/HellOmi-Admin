@extends('layouts.master')
	@section('title')
		Tambah Hasil
	@endsection
	@section('hasil') class="active" @endsection
	@section('konten')
    <?php function fakultasName($id){if($id==='A'){echo "FAPERTA";}elseif($id === 'B'){echo "FKH";}elseif($id==='C'){echo "FPIK";}elseif($id==='D'){echo "FAPET";}elseif($id==='E'){echo "FAHUTAN";}elseif($id==='F'){echo "FATETA";}elseif($id==='G'){echo "FMIPA";}elseif($id==='H'){echo "FEM";}elseif($id==='I'){echo "FEMA";}elseif($id==='J'){echo "DIPLOMA";}elseif($id==='P'){echo "PPKU";}}?>                                    
        <div class="page-title">
            <div class="title_left">
                <h3>Tambah Hasil <small>{{$jadwal->nama_cabor}}</small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        {!! Form::open(array('url'=>'hasil/post-atletik', 'role'=>'form', 'class="form-horizontal form-label-left"')) !!}
            <input type="hidden" name="idCabor" value="{{$jadwal->id_cabor}}">
        	 @foreach($fakultas as $row)
            <div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label">{{$row->singkatan}}</label>
        		<div class="col-md-6">
	        		<input type="number" class="form-control" name="{{$row->id_fakultas}}"> 
	        	</div>
        	</div>
            @endforeach
            <div class="clearfix"></div>
    	 	<div class="col-md-4">
        		<button type="submit" class="btn btn-success btn-sm" >Submit</button>
        	</div>
        {!! Form::close() !!}

    @endsection