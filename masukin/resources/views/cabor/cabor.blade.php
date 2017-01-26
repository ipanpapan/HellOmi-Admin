@extends('layouts.master')
    @section('title')
        Cabang Olahraga
    @endsection
    @section('cabor') class="active" @endsection
    @section('konten')
        <div class="row x_title">
            <div class="col-md-6 col-sm-6 col-xs-6"><div class="title_left">
                    @if($id==true && $id!="0")
                        <h3>{{$result[0]->nama_cabor}}</h3>
                    @else
                        <h3>Cabang Olahraga</h3>
                    @endif
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
               <div class="title_right">
                    <div class="col-md-2 pull-right">
                        @if($id!=0 && $edit==0)
                        <div class="input-group">
                             <a  href="{{ url('/cabor/edit',$id) }}" class="btn btn-success btn-sm">Edit</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="">
       
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="panel" style="height:380px;">
                        <div class="row">
                                <?php function fakultasName($id){if($id==='A'){echo "FAPERTA";}elseif($id === 'B'){echo "FKH";}elseif($id==='C'){echo "FPIK";}elseif($id==='D'){echo "FAPET";}elseif($id==='E'){echo "FAHUTAN";}elseif($id==='F'){echo "FATETA";}elseif($id==='G'){echo "FMIPA";}elseif($id==='H'){echo "FEM";}elseif($id==='I'){echo "FEMA";}elseif($id==='J'){echo "DIPLOMA";}elseif($id==='P'){echo "PPKU";}}?>             
                                {!! Form::open(array('url'=>'cabor/pilih', 'role'=>'form')) !!}
                                  <div class="col-md-4">
                                    <select class="form-control" id="sel1" name="cabor">
                                        <option value="0">Pilih Cabang Olahraga</option>
                                        @foreach($cabor as $pilihan)   
                                        <option value="{{$pilihan->id_cabor}}" @if($id==true && $pilihan->id_cabor==$result[0]->id_cabor) selected @endif>{{$pilihan->nama_cabor}}</option>
                                        @endforeach
                                      </select>
                                  </div>
                                  <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary btn-sm" name="button" value="search" >View</button>
                                  </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="clearfix"></div>
                        @if($id==true && $id!="0") 
                            <h3>Perolehan Dalam @if($id==11||$id==13)Point @elseif($id==12||$id==18||$id==19||$id==20)Detik @elseif($id==21||$id==22) Meter @elseif($id==15||$id==16) Menit @endif</h3>
                         {!! Form::open(array('url'=>'cabor/update-atletik', 'role'=>'form', 'class="form-horizontal form-label-left"')) !!}
                            <input type="hidden" name="idCabor" value="{{$id}}">
                         @foreach($result as $row)
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">{{$row->singkatan}}</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="{{$row->id_fakultas}}" @if($edit==0) readonly="readonly" @endif value="{{$row->waktu}}"> 
                                </div>
                            </div>
                         @endforeach
                         <div class="clearfix"></div>
                            @if($edit==1)
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-success btn-sm">Update</button>
                            </div>
                            @endif
                        {!! Form::close() !!}
                        @endif

                        <div class="x_content">
                                              
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    @endsection