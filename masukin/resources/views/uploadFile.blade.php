@extends('layouts.master')
	@section('title')
		Upload File
	@endsection
	@section('uploadFile') class="active" @endsection
	@section('konten')
		<div class="row x_title">
            <div class="col-md-6 col-sm-6 col-xs-6">
              <h3>Upload File</h3>
            </div>
        </div>
        {!! Form::open(array('url'=>'upload-file/post', 'role'=>'form', 'files'=>true, 'class="form-horizontal form-label-left"')) !!}
    	<div class="clearfix"></div>
    	<div class="form-group">
			<label class="col-md-2 control-label">File</label>
			<div class="col-md-6">
				<input type="file" name="file" required>
					@if($errors->has('file'))
			        	{!! $errors->first('file') !!}
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