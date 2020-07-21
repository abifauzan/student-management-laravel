<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>404 | Extra Bimbel Management App</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body class="four-zero-four">
    <div class="four-zero-four-container">
        <div class="error-code">404</div>
        <div class="error-message">{{ $exception->getMessage() }}</div>
        <div class="button-place">
            <a href="{{ route('dashboard') }}" class="btn btn-default btn-lg waves-effect">GO TO HOMEPAGE</a>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('node-waves/waves.js') }}"></script>

</body>

</html>
