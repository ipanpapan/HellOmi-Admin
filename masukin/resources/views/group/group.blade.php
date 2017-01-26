@extends('layouts.master')
    @section('title')
        Klasemen Group
    @endsection
    @section('klasemen') class="active" @endsection
    @section('konten')

        <div class="row x_title">
            <div class="col-md-6 col-sm-6 col-xs-6">
              <h3>Klasemen Group
                   @if($id==true && $id!="0")<small>{{$namaCabor->nama_cabor}}</small>@endif
              </h3>
            </div>
             <div class="col-md-6 col-sm-6 col-xs-6">
               <div class="title_right">
                    <div class="col-md-2 pull-right">
                        <div class="input-group">
                            <a  href="{{URL::to('/klasemen-group/add') }}" class="btn btn-success btn-sm">+ | Tambah</a>
                        </div>
                    </div>
                </div>
            </div>
          </div>

        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel" style="height:380px;">
        
            <div class="row">
            <?php function fakultasName($id){if($id==='A'){echo "FAPERTA";}elseif($id === 'B'){echo "FKH";}elseif($id==='C'){echo "FPIK";}elseif($id==='D'){echo "FAPET";}elseif($id==='E'){echo "FAHUTAN";}elseif($id==='F'){echo "FATETA";}elseif($id==='G'){echo "FMIPA";}elseif($id==='H'){echo "FEM";}elseif($id==='I'){echo "FEMA";}elseif($id==='J'){echo "DIPLOMA";}elseif($id==='P'){echo "PPKU";}}?>             
                {!! Form::open(array('url'=>'/klasemen-group/pilih', 'role'=>'form')) !!}
                  <div class="col-md-4">
                    <select class="form-control" id="sel1" name="cabor">
                        <option value="0">Pilih Cabang Olahraga</option>
                        @foreach($cabor as $pilihan)   
                        <option value="{{$pilihan->id_cabor}}" @if($id==true && $pilihan->id_cabor==$groupA[0]->id_cabor) selected @endif>{{$pilihan->nama_cabor}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-sm" name="button" value="search" >View</button>
                  </div>
                {!! Form::close() !!}
            @if($id==true)
            </div>



          <div class="row">
            
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Group A</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <table class="table">
                    <thead>
                      <tr>
                        <th>Fakultas</th>
                        <th>Win</th>
                        <th>Draw</th>
                        <th>Lose</th>
                        <th>Point</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach($groupA as $row)
                          <tr>
                              <td><?=fakultasName($row->id_fakultas)?></td>
                              <td>{{$row->win_klasemen}}</td>
                              <td>{{$row->draw_klasemen}}</td>
                              <td>{{$row->lose_klasemen}}</td>
                              <td>{{$row->poin_klasemen}}</td>
                              <td>
                                <a href="{{URL::to('klasemen-group/edit',array($row->id_klasemen))}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                <a href="{{URL::to('klasemen-group/delete',array($row->id_klasemen))}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                              </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>

                </div>
              </div>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Group B</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                 <table class="table">
                    <thead>
                      <tr>
                        <th>Fakultas</th>
                        <th>Win</th>
                        <th>Draw</th>
                        <th>Lose</th>
                        <th>Point</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach($groupB as $row)
                          <tr>
                              <td><?=fakultasName($row->id_fakultas)?></td>
                              <td>{{$row->win_klasemen}}</td>
                              <td>{{$row->draw_klasemen}}</td>
                              <td>{{$row->lose_klasemen}}</td>
                              <td>{{$row->poin_klasemen}}</td>
                              <td>
                                 <a href="{{URL::to('klasemen-group/edit',array($row->id_klasemen))}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                <a href="{{URL::to('klasemen-group/delete',array($row->id_klasemen))}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                              </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>


                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Group C</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Fakultas</th>
                        <th>Win</th>
                        <th>Draw</th>
                        <th>Lose</th>
                        <th>Point</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach($groupC as $row)
                          <tr>
                              <td><?=fakultasName($row->id_fakultas)?></td>
                              <td>{{$row->win_klasemen}}</td>
                              <td>{{$row->draw_klasemen}}</td>
                              <td>{{$row->lose_klasemen}}</td>
                              <td>{{$row->poin_klasemen}}</td>
                              <td>
                                <a href="{{URL::to('klasemen-group/edit',array($row->id_klasemen))}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                <a href="{{URL::to('klasemen-group/delete',array($row->id_klasemen))}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                              </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>


                </div>
              </div>
            </div>

            @if($id==1 || $id==2)
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Group D</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <table class="table">
                    <thead>
                      <tr>
                        <th>Fakultas</th>
                        <th>Win</th>
                        <th>Draw</th>
                        <th>Lose</th>
                        <th>Point</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach($groupD as $row)
                          <tr>
                              <td><?=fakultasName($row->id_fakultas)?></td>
                              <td>{{$row->win_klasemen}}</td>
                              <td>{{$row->draw_klasemen}}</td>
                              <td>{{$row->lose_klasemen}}</td>
                              <td>{{$row->poin_klasemen}}</td>
                              <td>
                                <a href="{{URL::to('klasemen-group/edit',array($row->id_klasemen))}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                <a href="{{URL::to('klasemen-group/delete',array($row->id_klasemen))}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                              </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>


                </div>
              </div>
            </div>
            @endif
          @endif
        </div>
        </div>
        </div>
        </div>
            <div class="clearfix"></div>
@endsection