@extends('layouts.master')
    @section('title')
        Klasemen Group
    @endsection
    @section('klasemen') class="active" @endsection
    @section('konten')

        <div class="row x_title">
            <div class="col-md-6">
              <h3>Klasemen Group</h3>
            </div>
            <div class="col-md-6">
               <div class="title_right">
                    <div class="col-md-2 pull-right">
                        <div class="input-group">
                            <a  href="{{ url('/klasemen/tambah') }}" class="btn btn-success btn-sm">+ | Tambah</a>
                        </div>
                    </div>
                </div>
            </div>
          </div>

        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <?php function fakultasName($id){if($id==='A'){echo "FAPERTA";}elseif($id === 'B'){echo "FKH";}elseif($id==='C'){echo "FPIK";}elseif($id==='D'){echo "FAPET";}elseif($id==='E'){echo "FAHUTAN";}elseif($id==='F'){echo "FATETA";}elseif($id==='G'){echo "FMIPA";}elseif($id==='H'){echo "FEM";}elseif($id==='I'){echo "FEMA";}elseif($id==='J'){echo "DIPLOMA";}elseif($id==='P'){echo "PPKU";}}?>             
                {!! Form::open(array('url'=>'/klasemen-group/pilih', 'role'=>'form')) !!}
                  <div class="col-md-4">
                    <select class="form-control" id="sel    1" name="cabor">
                        <option value="0">Pilih Cabang Olahraga</option>
                        @foreach($cabor as $pilihan)   
                        <option value="{{$pilihan->id_cabor}}" @if($id==true && $pilihan->id_cabor==$groupA[0]->id_cabor) selected @endif>{{$pilihan->nama_cabor}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-success btn-sm" name="button" value="search" >Search</button>
                  </div>
                {!! Form::close() !!}
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="panel" style="height:600px;">
                        @if($id==true)
                        <div class="x_title">
                            <h2>Klasemen Group</h2>
                            <div class="clearfix"></div>
                        </div>
                       
                        <div class="x_content">

                            <div class="row">
                               <h3>Group A</h3>
                               <div class="table-responsive">
                                    <table class="table table-bordered table-hover ">
                                        <thead>
                                            <th>Fakultas</th>
                                            <th>Win</th>
                                            <th>Draw</th>
                                            <th>Lose</th>
                                            <th>Point</th>
                                            <th>Action</th>
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
                                                    <a href="{{URL::to('edit',array($row->id_mhs))}}" class="btn btn-md btn-info">Edit</a>
                                                    <a href="{{URL::to('delete',array($row->id_mhs))}}" class="btn btn-md btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                @endforeach
                                        </tbody>
                                    </table>
                               </div>
                            </div>
                            <div class="row">
                               <h3>Group B</h3>
                               <div class="table-responsive">
                                    <table class="table table-bordered table-hover ">
                                        <thead>
                                            <th>Fakultas</th>
                                            <th>Win</th>
                                            <th>Draw</th>
                                            <th>Lose</th>
                                            <th>Point</th>
                                            <th>Action</th>
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
                                                    <a href="{{URL::to('edit',array($row->id_mhs))}}" class="btn btn-md btn-info">Edit</a>
                                                    <a href="{{URL::to('delete',array($row->id_mhs))}}" class="btn btn-md btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                @endforeach
                                        </tbody>
                                    </table>
                               </div>
                            </div>
                            <div class="row">
                               <h3>Group C</h3>
                               <div class="table-responsive">
                                    <table class="table table-bordered table-hover ">
                                        <thead>
                                            <th>Fakultas</th>
                                            <th>Win</th>
                                            <th>Draw</th>
                                            <th>Lose</th>
                                            <th>Point</th>
                                            <th>Action</th>
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
                                                    <a href="{{URL::to('edit',array($row->id_mhs))}}" class="btn btn-md btn-info">Edit</a>
                                                    <a href="{{URL::to('delete',array($row->id_mhs))}}" class="btn btn-md btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                @endforeach
                                        </tbody>
                                    </table>
                               </div>
                            </div>
                            @if($id==1 || $id==2)
                            <div class="row">
                               <h3>Group D</h3>
                               <div class="table-responsive">
                                    <table class="table table-bordered table-hover ">
                                        <thead>
                                            <th>Fakultas</th>
                                            <th>Win</th>
                                            <th>Draw</th>
                                            <th>Lose</th>
                                            <th>Point</th>
                                            <th>Action</th>
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
                                                    <a href="{{ url('/klasemen-group/edit',$row->id_klasemen) }}" class="btn btn-md btn-info">Edit</a>
                                                    <a href="{{ url('/klasemen-group/delete',$row->id_klasemen) }}" class="btn btn-md btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                @endforeach
                                        </tbody>
                                    </table>
                               </div>
                            </div>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endsection