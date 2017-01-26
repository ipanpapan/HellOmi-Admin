<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OMI APPS | Login</title>

    <!-- Bootstrap core CSS -->

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/fonts/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icheck/flat/green.css') }}" rel="stylesheet">


    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!--[if lt IE 9]>
        <script src="{{ asset('assets/js/ie8-responsive-file-warning.js') }}"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:#F7F7F7;">
    
    <div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                    <form role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}
                        <h1>Please Login</h1>
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">    
                            @if ($errors->has('username') || $errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="username" placeholder="Username" required="" />                            
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="" />                            
                        </div>
                        <div>
                            <button class="btn btn-default submit" type="submit">Log in</button>                            
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <!-- <div>
                                <h1><i class="fa fa-paw" style="font-size: 26px;"></i> Gentelella Alela!</h1>

                                <p>©2015 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                            </div> -->
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>            
        </div>
    </div>

</body>

</html>