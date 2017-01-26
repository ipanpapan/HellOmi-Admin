@extends('layouts.master')
	@section('title')
		Edit Grup
	@endsection
	@section('klasemen') class="active" @endsection
	@section('konten')
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Klasemen Group</h3>
            </div>
        </div>
        <div class="clearfix"></div>
         <?php function fakultasName($id){if($id==='A'){echo "FAPERTA";}elseif($id === 'B'){echo "FKH";}elseif($id==='C'){echo "FPIK";}elseif($id==='D'){echo "FAPET";}elseif($id==='E'){echo "FAHUTAN";}elseif($id==='F'){echo "FATETA";}elseif($id==='G'){echo "FMIPA";}elseif($id==='H'){echo "FEM";}elseif($id==='I'){echo "FEMA";}elseif($id==='J'){echo "DIPLOMA";}elseif($id==='P'){echo "PPKU";}}?>             
         {!! Form::open(array('url'=>'klasemen-group/update', 'role'=>'form', 'class="form-horizontal form-label-left"')) !!}
        	<input type="hidden" name="id_klasemen" value="{{$data->id_klasemen}}">
        	<div class="form-group">
        		<label class="col-md-2 control-label">Fakultas</label>
	        	<div class="col-md-6">
	        		<input type="text" class="form-control" name="id_fakultas" value="<?=fakultasName($data->id_fakultas)?>" disabled>
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label">Group</label>
	        	<div class="col-md-6">
	        		<select name="nama_group" class="form-control">
	        			<option value="A" @if($data->nama_grup=='A') selected @endif>A</option>
	        			<option value="B" @if($data->nama_grup=='B') selected @endif>B</option>
	        			<option value="C" @if($data->nama_grup=='C') selected @endif>C</option>
	        			<option value="D" @if($data->nama_grup=='D') selected @endif>D</option>
	        		</select>
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label">Win</label>
	        	<div class="col-md-6">
	        		<input type="number" class="form-control" name="win_klasemen" value="{{$data->win_klasemen}}" >
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label">Draw</label>
	        	<div class="col-md-6">
	        		<input type="number" class="form-control" name="draw_klasemen" value="{{$data->draw_klasemen}}" >
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label">Lose</label>
	        	<div class="col-md-6">
	        		<input type="number" class="form-control" name="lose_klasemen" value="{{$data->lose_klasemen}}" >
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	
    	 	<div class="col-md-4">
                <a href="{{back()}}"><button class="btn btn-primary btn-sm" >Batalkan</button></a>
        		<button type="submit" class="btn btn-success btn-sm" >Update</button>
        		
        	</div>
        {!! Form::close() !!}

    @endsection