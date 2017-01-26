<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OMI APPS | @yield('title')</title>

    <!-- Bootstrap core CSS -->

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/fonts/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/maps/jquery-jvectormap-2.0.1.css') }}" />
    <link href="{{ asset('assets/css/icheck/flat/green.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/floatexamples.css') }}" rel="stylesheet" type="text/css" />


    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>

    <!--[if lt IE 9]>
        <script src="{{ asset('assets/js/ie8-responsive-file-warning.js') }}"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><img src="{{asset('assets/images/icon-omi.png')}}"> <span>OMI APPS</span></a>
                    </div>
                    <div class="clearfix"></div>


                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="{{ asset('assets/images/img.jpg') }}" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{ Auth::User()->name }}</h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br>

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>cupu</h3>
                            <ul class="nav side-menu">
                                <li>
                                    <a><i class="fa fa-home"></i> Dashboard </a>
                                </li>
                                <li>
                                    <a><i class="fa fa-edit"></i> Hasil </a>
                                </li>
                                <li {{ (Request::is('medali') ? 'class=active':'')}}>
                                    <a href="{{ url('/medali') }}"><i class="fa fa-desktop"></i> Medali </a>
                                </li>
                                <li @yield('informasi')>
                                    <a href="{{ url('/informasi') }}"><i class="fa fa-table"></i> Informasi </a>
                                </li>
                                <li @yield('cabor')>
                                    <a href="{{ url('/cabor') }}"><i class="fa fa-bar-chart-o"></i> Cabang Olahraga </a>
                                </li>
                                <li @yield('klasemen')>
                                    <a href="{{ url('/klasemen-group') }}"><i class="fa fa-table"></i> Klasemen Grup </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->                    
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('assets/images/img.jpg') }}" alt="">{{ Auth::User()->name }}
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li>
                                        <a href="{{ url('/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->


            <!-- page content -->
            <div class="right_col" role="main">
                @yield('konten')
                <!-- footer content -->
                <footer>
                    <div class="">
                        <p class="pull-right">Gentelella Alela! a Bootstrap 3 template by <a>Kimlabs</a>. |
                            <span class="lead"> <i class="fa fa-paw"></i> Gentelella Alela!</span>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
            <!-- /page content -->
        </div>


    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>    
</body>

</html>