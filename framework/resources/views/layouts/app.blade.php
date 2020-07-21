<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Database Siswa Extra Bimbel | @yield('title')</title>
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

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="{{ asset('bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="{{ asset('waitme/waitMe.css')}}" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="{{ asset('bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('css/themes/all-themes.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="{{ asset('jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
      @include('layouts.header')
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
          @include('layouts.sidebar')

        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation" class="active"><a href="#settings" data-toggle="tab">ACCOUNT</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade in active in active" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>View Profile</span>
                                <div class="switch">
                                  @if (Auth::guard('admin')->check())
                                    <a href="{{Route('admin.profile')}}" type="button" class="btn bg-blue btn-sm waves-effect">
                                      View
                                    </a>
                                  @else
                                    <a href="{{Route('siswa.get.profile')}}" type="button" class="btn bg-blue btn-sm waves-effect">
                                      View
                                    </a>
                                  @endif
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Sign Out</span>
                                <div class="switch">
                                @if (Auth::guard('admin')->check())
                                  <form class="" action="{{ route('admin.logout') }}" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn bg-pink btn-sm waves-effect">
                                      Sign Out
                                    </button>
                                  </form>
                                @else
                                  <form class="" action="{{ route('siswa.logout') }}" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn bg-pink btn-sm waves-effect">
                                      Sign Out
                                    </button>
                                  </form>
                                @endif



                                 </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
          @yield('content')
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('node-waves/waves.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('js/admin.js') }}"></script>

    <!-- Autosize Plugin Js -->
    <script src="{{ asset('autosize/autosize.js')}}"></script>

    <!-- Moment Plugin Js -->
    <script src="{{ asset('momentjs/moment.js')}}"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="{{ asset('bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>

    <script src="{{ asset('js/basic-form-elements.js')}}"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{ asset('jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{ asset('jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{ asset('jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{ asset('jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

    <script src="{{ asset('js/jquery-datatable.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{ asset('js/demo.js') }}"></script>
    @yield('script')
</body>

</html>
