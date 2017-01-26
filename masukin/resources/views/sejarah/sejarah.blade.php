@extends('layouts.master')
    @section('title')
        Sejarah
    @endsection
    @section('sejarah') class="active" @endsection
@section('konten')
        <div class="">

          <div class="page-title">
            <div class="title_left">
              <h3>
                   Sejarah
                    <small>
                        OMI
                    </small>
                </h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2> Inbox Design<small>User Mail</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">


                  <div class="row">

                    <div class="col-sm-3 mail_list_column">

                     @foreach($sejarah as $row)
                      <div class="mail_list">
                        <div class="left">
                          <i class="fa fa-paperclip"></i>
                        </div>
                        <div class="right">
                          <a href="{{ url('/sejarah', $row->id_sejarah) }}"><h3>{{$row->singkatan}}</h3></a>
                          <p>{{str_limit($row->sejarah_lengkap, 100)}}</p>
                        </div>
                      </div>
                      @endforeach

                      
                    </div>
                    <!-- /MAIL LIST -->

                    @if($id!=0)
                    @foreach ($pilih as $row)
                    <!-- CONTENT MAIL -->
                    <div class="col-sm-9 mail_view">
                      <div class="inbox-body">
                        <div class="mail_heading row">
                          <div class="col-md-8">
                            <div class="compose-btn">
                              
                              <a href="{{url('/sejarah/edit',$row->id_sejarah)}}"><button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Edit" class="btn  btn-sm tooltips"><i class="fa fa-pencil-square-o"></i> </button></a>
                              <!-- <a href="{{url('/sejarah/hapus',$row->id_sejarah)}}"><button title="" data-placement="top" data-toggle="tooltip" data-original-title="Delete" class="btn btn-sm tooltips"><i class="fa fa-trash-o"></i>
                              </button></a> -->
                            </div>

                          </div>
                          <div class="col-md-4 text-right">
                            <p class="date">updated at <?=date("j F Y, h:i", strtotime($row->updated_at))?></p>
                          </div>
                          <div class="col-md-12">
                            <h4>{{$row->nama_fakultas}} <small> {{$row->suporter_fakultas}}</small></h4>
                          </div>
                        </div>
                        
                        <div class="view-mail">
                          <p><?=str_replace("\\n", "<br>", $row->sejarah_lengkap)?></p>  
                        </div>
                        <div class="attachment">
                          <ul>
                            <li>
                              <a href="#" class="atch-thumb">
                                <img src="{{ asset('assets/images/fakultas/'.$row->id_fakultas.'.png') }}" alt="img" />
                              </a>

                          </ul>
                        </div>
                      </div>

                    </div>
                    <!-- /CONTENT MAIL -->
                    @endforeach
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection