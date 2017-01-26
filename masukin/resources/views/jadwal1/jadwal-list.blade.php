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
                        <!-- <td>@if($row->id_cabor==11 || $row->id_cabor==15 || $row->id_cabor==16) ALL @else
                          <ul class="list-inline">
                            <li>
                              <img src="{{ asset('assets/images/fakultas/'.$row->fakultasA.'.png') }}" class="avatar" alt="Avatar">
                            </li>
                            <li>
                              <img src="{{ asset('assets/images/fakultas/'.$row->fakultasB.'.png') }}" class="avatar" alt="Avatar">
                            </li>
                            @if($row->fakultasC==true)
                            <li>
                              <img src="{{ asset('assets/images/fakultas/'.$row->fakultasC.'.png') }}" class="avatar" alt="Avatar">
                            </li>
                            @endif
                            @if($row->fakultasD==true)
                            <li>
                              <img src="{{ asset('assets/images/fakultas/'.$row->fakultasD.'.png') }}" class="avatar" alt="Avatar">
                            </li>
                            @endif
                          </ul> @endif
                        </td> -->
                        <td>{{$row->babak_pertandingan}}</td>
                        <td><?=date("j F Y, h:i", strtotime($row->tanggal_pertandingan))?></td>
                        <td>{{$row->tempat_pertandingan}}</td>
                        <td>@if($row->status==1)<span class="label label-success">Sudah</span> @else <span class="label label-default">Belum</span>@endif</td>
                        <td>
                        @if($row->status==1)
                          <a href="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="View Hasil" class="btn  btn-sm tooltips"><i class="fa fa-file-o"></i></a>
                        @else
                          <a href="{{ url('cabor/tambah-hasil',$row->id_pertandingan) }}" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Report" class="btn  btn-sm tooltips"><i class="fa fa-archive"></i></a>
                        @endif
                          <a href="{{ url('cabor/jadwal/edit',$row->id_pertandingan) }}" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Edit" class="btn  btn-sm tooltips"><i class="fa fa-pencil"></i></a>
                          <a href="{{ url('cabor/jadwal/delete',$row->id_pertandingan) }}" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Delete" class="btn  btn-sm tooltips"><i class="fa fa-trash-o"></i></a>
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