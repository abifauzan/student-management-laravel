<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Database Siswa Extra Bimbel | Sign In</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
      body {
        background-color: #00BCD4 !important;
        -webkit-animation: color 5s ease-in  0s infinite alternate running;
      	-moz-animation: color 5s linear  0s infinite alternate running;
      	animation: color 5s linear  0s infinite alternate running;

      }
      @-webkit-keyframes color {
          0% { background-color: #00BCD4; }
          32% { background-color: #2196F3; }
          55% { background-color: #3F51B5; }
          76% { background-color: #009688; }
          100% { background-color: #4CAF50; }
      }
      @-moz-keyframes color {
        0% { background-color: #00BCD4; }
        32% { background-color: #2196F3; }
        55% { background-color: #3F51B5; }
        76% { background-color: #009688; }
        100% { background-color: #4CAF50; }
      }
      @keyframes color {
        0% { background-color: #00BCD4; }
        32% { background-color: #2196F3; }
        55% { background-color: #3F51B5; }
        76% { background-color: #009688; }
        100% { background-color: #4CAF50; }
      }
    </style>
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Database <b>ExtraBimbel</b></a>
            <small>Aplikasi Database Siswa Extra Bimbel.</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="{{ route('siswa.login.submit') }}">
                  {{ csrf_field() }}
                    <div class="msg">Sign in to start your session</div>

                  @if(Session::has('message'))
                    <div class="alert bg-pink alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        {{Session::get('message')}}
                    </div>
                  @endif


                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" value="{{old('username')}}" placeholder="NIS Siswa" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="" data-toggle="modal" data-target="#defaultModal">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="" data-toggle="modal" data-target="#defaultModal">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="footer col-white align-center">
            <p>Copyright © {{date('Y')}} Extra Bimbel. Made with <i class="material-icons font-12">favorite_border</i></p>
        </div>
    </div>


    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Information</h4>
                </div>
                <div class="modal-body">
                    Please ask to <span class="text-primary">admin extra bimbel</span> for information about your account &#9786;
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery Core Js -->
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('node-waves/waves.js') }}"></script>

    <!-- Validation Plugin Js -->
    <script src="{{ asset('js/jquery.validate.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/sign-in.js') }}"></script>
</body>

</html>
