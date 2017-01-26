@extends('layouts.master')
    @section('title')
        Jadwal
    @endsection
    
@section('konten')
      <!-- page content -->
      <div class="col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
                    Jadwal Pertandingan
                    
                </h3>
            </div>
            <div class="title_right">
                    <div class="col-md-2 col-sm-2 pull-right">
                        <div class="input-group">
                             <a  href="{{ url('/jadwal/tambah') }}" class="btn btn-success btn-sm">+ | Tambah</a>
                        </div>
                    </div>
                </div>
<?php function fakultasName($id){if($id==='A'){echo "FAPERTA";}elseif($id === 'B'){echo "FKH";}elseif($id==='C'){echo "FPIK";}elseif($id==='D'){echo "FAPET";}elseif($id==='E'){echo "FAHUTAN";}elseif($id==='F'){echo "FATETA";}elseif($id==='G'){echo "FMIPA";}elseif($id==='H'){echo "FEM";}elseif($id==='I'){echo "FEMA";}elseif($id==='J'){echo "DIPLOMA";}elseif($id==='P'){echo "PPKU";}}?>
<?php function namaPlace($id){if(($id==='11')||($id==='13')){echo 'Point';}else if(($id==='21')||($id==='22')){echo 'Jarak';}else if(($id==='12')||($id==='15')||($id==='16')||($id==='17')||($id==='18')||($id==='19')||($id==='20')){echo 'Waktu';}}?>             
       
          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Jadwal <small>OMI</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Cabor</th>
                        <th>Fakultas</th>
                        <th>Babak</th>
                        <th>Waktu</th>
                        <th>Tempat</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>


                    <tbody>
                    @foreach($jadwal as $row)
                      <tr>
                        <td>{{$row->id_pertandingan}}</td>
                        <td>{{$row->nama_cabor}}</td>
                        <td>@if($row->id_cabor==11 || $row->id_cabor==15 || $row->id_cabor==16) ALL
                            @else
                              @if($row->fakultasB==true)<?=fakultasName($row->fakultasA)?> VS <?=fakultasName($row->fakultasB)?> @endif
                                  @if($row->fakultasC==true) VS <?=fakultasName($row->fakultasC)?> @endif
                                  @if($row->fakultasD==true) VS <?=fakultasName($row->fakultasD)?> @endif
                            @endif
                        </td>
                        <td>{{$row->babak_pertandingan}}</td>
                        <td><?=date("j F Y, h:i", strtotime($row->tanggal_pertandingan))?></td>
                        <td>{{$row->tempat_pertandingan}}</td>
                        <td>@if($row->status==1)<span class="label label-success">Sudah</span> @else <span class="label label-default">Belum</span>@endif</td>
                        <td>
                        @if($row->status==1)
                          <a href="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="View Hasil" class="btn  btn-sm tooltips"><i class="fa fa-file-o"></i></a>
                        @else
                          <a href="" data-placement="top" data-toggle="modal" data-target="#hasil{{$row->id_pertandingan}}" type="button" data-original-title="Report" class="btn  btn-sm"><i class="fa fa-archive"></i></a>
                        @endif
                          <a href="" data-placement="top" data-toggle="modal" data-target="#edit{{$row->id_pertandingan}}" type="button" data-original-title="Edit" class="btn  btn-sm"><i class="fa fa-pencil"></i></a>
                          <a href="" data-placement="top" data-toggle="modal" data-target="#delete{{$row->id_pertandingan}}" type="button" data-original-title="Delete" class="btn  btn-sm tooltips"><i class="fa fa-trash-o"></i></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
@endsection


@section('js')
        <script src="{{ asset('assets/js/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatables/dataTables.bootstrap.js') }}"></script>
        <script src="{{ asset('assets/js/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatables/buttons.bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatables/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatables/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatables/vfs_fonts.js') }}"></script>
        <script src="{{ asset('assets/js/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatables/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatables/dataTables.fixedHeader.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatables/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatables/responsive.bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatables/dataTables.scroller.min.js') }}"></script>


        <!-- pace -->
        <script src="{{ asset('assets/js/pace/pace.min.js') }}"></script>
        <script>
          var handleDataTableButtons = function() {
              "use strict";
              0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
                dom: "Bfrtip",
                buttons: [{
                  extend: "copy",
                  className: "btn-sm"
                }, {
                  extend: "csv",
                  className: "btn-sm"
                }, {
                  extend: "excel",
                  className: "btn-sm"
                }, {
                  extend: "pdf",
                  className: "btn-sm"
                }, {
                  extend: "print",
                  className: "btn-sm"
                }],
                responsive: !0
              })
            },
            TableManageButtons = function() {
              "use strict";
              return {
                init: function() {
                  handleDataTableButtons()
                }
              }
            }();
        </script>
        <script type="text/javascript">
          $(document).ready(function() {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({
              keys: true
            });
            $('#datatable-responsive').DataTable();
            $('#datatable-scroller').DataTable({
              ajax: "js/datatables/json/scroller-demo.json",
              deferRender: true,
              scrollY: 380,
              scrollCollapse: true,
              scroller: true
            });
            var table = $('#datatable-fixed-header').DataTable({
              fixedHeader: true
            });
          });
          TableManageButtons.init();
        </script>
@endsection

@section('modal')
@foreach($jadwal as $row)

  <div class="modal fade fadeIn hasil" id="hasil{{$row->id_pertandingan}}" tabindex="-1" role="dialog" aria-labelledby="hasilLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          @if(($row->id_cabor==1)||($row->id_cabor==2)||($row->id_cabor==3)||($row->id_cabor==4)||($row->id_cabor==5)||($row->id_cabor==6)||($row->id_cabor==7)||($row->id_cabor==8)||($row->id_cabor==9)||($row->id_cabor==10)||($row->id_cabor==14))
          <h4 class="modal-title" id="hasilLabel">Hasil Pertandingan {{$row->nama_cabor}} @if($row->fakultasB==true)<?=fakultasName($row->fakultasA)?> VS <?=fakultasName($row->fakultasB)?> @endif
                    @if($row->fakultasC==true) VS <?=fakultasName($row->fakultasC)?> @endif
                    @if($row->fakultasD==true) VS <?=fakultasName($row->fakultasD)?> @endif</h4>
        </div>
        <div class="modal-body">
          <div class="clearfix"></div>
          {!! Form::open(array('url'=>'hasil/post', 'role'=>'form', 'class="form-horizontal form-label-left"')) !!}
              <input type="hidden" name="idPertandingan" value="{{$row->id_pertandingan}}">
              <input type="hidden" name="idCabor" value="{{$row->id_cabor}}">
            <div class="clearfix"></div>
            <div class="form-group">
              <label class="col-md-3 control-label">Hasil <?=fakultasName($row->fakultasA)?></label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="hasilA" placeholder = "Score">
                  @if($errors->has('hasilA'))
                    {!! $errors->first('hasilA') !!}
                  @endif
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
              <label class="col-md-3 control-label">Hasil <?=fakultasName($row->fakultasB)?></label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="hasilB" placeholder = "Score">
                  @if($errors->has('hasilB'))
                    {!! $errors->first('hasilB') !!}
                  @endif
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
              <label class="col-md-3 control-label">Detail</label>
              <div class="col-md-6">
                <textarea name="detail" class="form-control"> </textarea>
                  @if($errors->has('detail'))
                        {!! $errors->first('detail') !!}
                  @endif 
              </div>          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button href="" type="submit" class="btn btn-primary" class="form-control" name="submit">Submit</button>
          </div>
          {!! Form::close() !!}
          </div>
        </div>
        @else
        <div class="modal-header">
          <h4 class="modal-title" id="hasilLabel">
          Hasil Pertandingan {{$row->nama_cabor}}
          </h4>
        </div>
        <div class="modal-body">          
        <div class="clearfix"></div>
        {!! Form::open(array('url'=>'hasil/post-atletik', 'role'=>'form', 'class="form-horizontal form-label-left"')) !!}
            <input type="hidden" name="idCabor" value="{{$row->id_cabor}}">
            <input type="hidden" name="idPertandingan" value="{{$row->id_pertandingan}}">
           @foreach($fakultas as $row1)
            <div class="clearfix"></div>
          <div class="form-group">
            <label class="col-md-2 control-label">{{$row1->singkatan}}</label>
            <div class="col-md-6">
              <input type="number" class="form-control" name="{{$row1->id_fakultas}}" placeholder= @if(($row->id_cabor==11)||($row->id_cabor==13)) 'Point' @elseif(($row->id_cabor==21)||($row->id_cabor==22)) 'Jarak' @else 'Waktu' @endif > 
            </div>
          </div>
            @endforeach
        
          <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button href="" type="submit" class="btn btn-primary" class="form-control" name="submit">Submit</button>
        </div>
        {!! Form::close() !!}
        @endif
      </div>
    </div>
  </div>

  @endforeach
@endsection

@section('modalEdit')
  @foreach($jadwal as $row)
    <div class="modal fade fadeIn edit" id="edit{{$row->id_pertandingan}}" tabindex="-1" role="dialog" aria-labelledby="editLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="hasilLabel">Edit Pertandingan {{$row->nama_cabor}} @if($row->fakultasB==true)<?=fakultasName($row->fakultasA)?> VS <?=fakultasName($row->fakultasB)?> @endif
                    @if($row->fakultasC==true) VS <?=fakultasName($row->fakultasC)?> @endif
                    @if($row->fakultasD==true) VS <?=fakultasName($row->fakultasD)?> @endif</h4>
        </div>
        <div class="modal-body">
        <div class="clearfix"></div>
        {!! Form::open(array('url'=>'jadwal/update', 'role'=>'form', 'class="form-horizontal form-label-left"')) !!}
          <input type="hidden" name="idPertandingan" value="{{ $row->id_pertandingan }}">
          <div class="form-group">
            <label class="col-md-2 control-label" align="right">Cabang Olahraga</label>
            <div class="col-md-6">
              <select class="form-control" id="sel1" name="cabangOlahraga">
                        <option value="0">Pilih Cabang Olahraga</option>   
                        <option value="{{$row->id_cabor}}" @if($row->id_cabor == $row->id_cabor) selected @endif>{{$row->nama_cabor}}</option>
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
              <input type="date" class="form-control" name="tanggal" value="<?=date("Y-m-d", strtotime($row->tanggal_pertandingan))?>">
                @if($errors->has('tanggal'))
                  {!! $errors->first('tanggal') !!}
                @endif
            </div>
            </div>
          <div class="clearfix"></div>
          <div class="form-group">
            <label class="col-md-2 control-label" align="right">Waktu Pertandingan</label>
            <div class="col-md-6">
              <input type="time" class="form-control" name="waktu" value="<?=date("h:i", strtotime($row->tanggal_pertandingan))?>">
                @if($errors->has('waktu'))
                  {!! $errors->first('waktu') !!}
                @endif
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="form-group">
            <label class="col-md-2 control-label" align="right">Tempat Pertandingan</label>
            <div class="col-md-6">
              <input type="text" name="tempat" class="form-control" value="{{$row->tempat_pertandingan}}">
                @if($errors->has('tempat'))
                  {!! $errors->first('tempat') !!}
                @endif
            </div>
          </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <label class="col-md-2 control-label" align="right">Babak Pertandingan</label>
                <div class="col-md-6">
                    <input type="text" name="babak" class="form-control" value="{{$row->babak_pertandingan}}">
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
                      <input type="radio" class="flat" name="status" id="genderM" value="1" @if($row->status==1) checked=""@endif required /> Sudah &nbsp
                      <input type="radio" class="flat" name="status" id="genderF" value="0" @if($row->status==0) checked=""@endif/> Belum
                    </p>  
                </div>
            </div>
            <div class="clearfix"></div>
          <div class="form-group">
            <label class="col-md-2 control-label" align="right">Fakultas A</label>
            <div class="col-md-6">
              <select class="form-control" id="sel1" name="fakultasA">
                        <option value="0">Pilih Fakultas</option>
                        
                    </select>
              
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="form-group">
            <label class="col-md-2 control-label" align="right">Fakultas B</label>
            <div class="col-md-6">
              <select class="form-control" id="sel1" name="fakultasB">
                        <option value="0">Pilih Fakultas</option>
                        
                    </select>
              
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="form-group">
            <label class="col-md-2 control-label"align="right">Fakultas C</label>
            <div class="col-md-6">
              <select class="form-control" id="sel1" name="fakultasC">
                        <option value="0">Pilih Fakultas</option>
                        
                    </select>
              
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="form-group">
            <label class="col-md-2 control-label" align="right">Fakultas D</label>
            <div class="col-md-6">
              <select class="form-control" id="sel1" name="fakultasD">
                        <option value="0">Pilih Fakultas</option>
                        
                    </select>
              @if($errors->has('idCabang'))
                {!! $errors->first('idCabang') !!}
              @endif
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
        <button type="submit" class="btn btn-primary" name="submit" class="form-control" value="Submit">Edit</button>
        </div>
        {!! Form::close() !!}
        </div>
      </div>
    </div>
    </div>
  @endforeach
@endsection

@section('delete')
@foreach($jadwal as $row)
  <div class="modal fade fadeIn hasil" id="delete{{$row->id_pertandingan}}" tabindex="-1" role="dialog" aria-labelledby="deleteLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="deleteLabel">Hapus Pertandingan {{$row->nama_cabor}} @if($row->fakultasB==true)<?=fakultasName($row->fakultasA)?> VS <?=fakultasName($row->fakultasB)?> @endif
                    @if($row->fakultasC==true) VS <?=fakultasName($row->fakultasC)?> @endif
                    @if($row->fakultasD==true) VS <?=fakultasName($row->fakultasD)?> @endif</h4>
        </div>
        <div class="modal-body">
          <h4>Apakah anda yakin untuk menghapus ini ?</h4>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
        <a href="{{ url('cabor/jadwal/delete',$row->id_pertandingan) }}" type="submit" class="btn btn-primary" name="submit" class="form-control" value="Submit">Iya</a>
        </div>
      </div>
    </div>
  </div>
@endforeach
@endsection