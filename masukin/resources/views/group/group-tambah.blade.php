@extends('layouts.master')
	@section('title')
		Tambah Klasemen Group
	@endsection
	@section('klasemen') class="active" @endsection
	@section('konten')
        <div class="page-title">
            <div class="title_left">
                <h3>Tambah Klasemen Group</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <?php function fakultasName($id){if($id==='A'){echo "FAPERTA";}elseif($id === 'B'){echo "FKH";}elseif($id==='C'){echo "FPIK";}elseif($id==='D'){echo "FAPET";}elseif($id==='E'){echo "FAHUTAN";}elseif($id==='F'){echo "FATETA";}elseif($id==='G'){echo "FMIPA";}elseif($id==='H'){echo "FEM";}elseif($id==='I'){echo "FEMA";}elseif($id==='J'){echo "DIPLOMA";}elseif($id==='P'){echo "PPKU";}}?>             
         {!! Form::open(array('url'=>'klasemen-group/post', 'role'=>'form', 'class="form-horizontal form-label-left"')) !!}
        	<div class="form-group">
        		<label class="col-md-2 control-label">Fakultas</label>
	        	<div class="col-md-6">
	        		<select name="id_fakultas" class="form-control" required>
	        		<!-- <option value="0">Pilih Fakultas</option> -->
                        @foreach($fakultas as $fakultas)   
                        <option value="{{$fakultas->id_fakultas}}" >{{$fakultas->nama_fakultas}}</option>
                        @endforeach
                    </select>
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label">Cabang Olahraga</label>
	        	<div class="col-md-6">
	        		<select name="id_cabor" class="form-control" required>
	        		<!-- <option value="0">Pilih Cabor</option> -->
                        @foreach($cabor as $cabor)   
                        <option value="{{$cabor->id_cabor}}" >{{$cabor->nama_cabor}}</option>
                        @endforeach
                    </select>
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label">Group</label>
	        	<div class="col-md-6">
	        		<select name="nama_group" class="form-control" required>
	        			<option value="A" >A</option>
	        			<option value="B" >B</option>
	        			<option value="C" >C</option>
	        			<option value="D" >D</option>
	        		</select>
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label">Win</label>
	        	<div class="col-md-6">
	        		<input type="number" class="form-control" name="win_klasemen" required>
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label">Draw</label>
	        	<div class="col-md-6">
	        		<input type="number" class="form-control" name="draw_klasemen" required>
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label">Lose</label>
	        	<div class="col-md-6">
	        		<input type="number" class="form-control" name="lose_klasemen" required>
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	
    	 	<div class="col-md-4">
                <a href="{{back()}}"><button class="btn btn-primary btn-sm" >Batalkan</button></a>
        		<button type="submit" class="btn btn-success btn-sm" >Tambah</button>
        		
        	</div>
        {!! Form::close() !!}

    @endsection