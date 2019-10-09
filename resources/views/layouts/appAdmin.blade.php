<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Healthy Start</title>

  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>


    

    <link href="{{asset('/css/bootstrap-slider.css')}}?{{time()}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/icons.css')}}?{{time()}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/bootstrap-slider.css')}}?{{time()}}" rel="stylesheet" type="text/css" >

    <!-- Custom styles for this template -->
    <link href="{{asset('/css/sticky-footer-navbar.css')}}?{{time()}}" rel="stylesheet">
    <link href="{{asset('/css/style.css')}}?{{time()}}" rel="stylesheet" type="text/css" >
    <style>
        @yield('pageStyle')
    </style>
</head>
<body class="bg-white">
    <header>
        @yield('navigation')
    </header>
    <main role="main" class="container">
        @yield('content')
    </main>
     <main role="main" class="">
        @yield('content2')
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{asset('/js/jquery.min.js')}}?{{time()}}" type="text/javascript"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}?{{time()}}" type="text/javascript"></script>
    <script src="{{asset('/js/icons.js')}}?{{time()}}" type="text/javascript"></script>
    <script src="{{asset('/js/bootstrap-slider.js')}}?{{time()}}" type="text/javascript"></script>
    <script src="{{asset('/js/combodate.js')}}?{{time()}}" type="text/javascript"></script>

</body>
</html>
