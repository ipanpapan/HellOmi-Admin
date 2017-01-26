@extends('layouts.master')
	@section('title')
		Tambah Hasil
	@endsection
	@section('cabor') class="active" @endsection
	@section('konten')
    <?php function fakultasName($id){if($id==='A'){echo "FAPERTA";}elseif($id === 'B'){echo "FKH";}elseif($id==='C'){echo "FPIK";}elseif($id==='D'){echo "FAPET";}elseif($id==='E'){echo "FAHUTAN";}elseif($id==='F'){echo "FATETA";}elseif($id==='G'){echo "FMIPA";}elseif($id==='H'){echo "FEM";}elseif($id==='I'){echo "FEMA";}elseif($id==='J'){echo "DIPLOMA";}elseif($id==='P'){echo "PPKU";}}?>                                    
        <div class="page-title">
            <div class="title_left">
                <h3>Report Pertandingan</h3>
                <h4>{{$jadwal->nama_cabor}}</h4>
            </div>
        </div>
        <div class="clearfix"></div>
        {!! Form::open(array('url'=>'hasil/post', 'role'=>'form', 'class="form-horizontal form-label-left"')) !!}
            <input type="hidden" name="idPertandingan" value="{{$jadwal->id_pertandingan}}">
            <input type="hidden" name="idCabor" value="{{$jadwal->id_cabor}}">
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label">Score <?=fakultasName($jadwal->fakultasA)?></label>
        		<div class="col-md-6">
	        		<input type="text" class="form-control" name="hasilA">
			        	@if($errors->has('hasilA'))
			        		{!! $errors->first('hasilA') !!}
			        	@endif
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label class="col-md-2 control-label">Score <?=fakultasName($jadwal->fakultasB)?></label>
        		<div class="col-md-6">
	        		<input type="text" class="form-control" name="hasilB">
			        	@if($errors->has('hasilB'))
			        		{!! $errors->first('hasilB') !!}
			        	@endif
	        	</div>
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
				<label class="col-md-2 control-label">Detail</label>
				<div class="col-md-6">
					<textarea name="detail" class="resizable_textarea form-control" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" class="form-control"> </textarea>
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

      @section('js')
    <script src="{{ asset('assets/js/textarea/autosize.min.js') }}"></script>
  <script>
    autosize($('.resizable_textarea'));
  </script>
  @endsection