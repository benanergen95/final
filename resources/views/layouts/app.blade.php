<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Healthy Start</title>


    <link href="{{asset('/css/bootstrap.min.css')}}?{{time()}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/bootstrap-slider.css')}}?{{time()}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/icons.css')}}?{{time()}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/bootstrap-slider.css')}}?{{time()}}" rel="stylesheet" type="text/css" >
   
    <!-- Custom styles for this template -->
    <link href="{{asset('/css/sticky-footer-navbar.css')}}?{{time()}}" rel="stylesheet">
    <link href="{{asset('/css/style.css')}}?{{time()}}" rel="stylesheet" type="text/css" >
        @yield('css')
    


    <style>
        @media print {#ghostery-purple-box {display:none !important}}
        
        body {
          background-image: url("{{asset('/content/main_background.jpg')}}?{{time()}}"); 
          background-size: cover;
        }
        @yield('pageStyle')
    </style>
</head>
<body>
    <header>
        @yield('navigation')
    </header>
    <main role="main" class="container">
        @yield('content')
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{asset('/js/jquery.min.js')}}?{{time()}}" type="text/javascript"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}?{{time()}}" type="text/javascript"></script>
    <script src="{{asset('/js/icons.js')}}?{{time()}}" type="text/javascript"></script>
    <script src="{{asset('/js/bootstrap-slider.js')}}?{{time()}}" type="text/javascript"></script>
    <script src="{{asset('/js/combodate.js')}}?{{time()}}" type="text/javascript"></script>
    <script src="{{asset('/js/moment.js')}}?{{time()}}" type="text/javascript"></script>

</body>
    @yield('script')
</html>

<!--

    <link href="{{asset('/css/extra-diet.css')}}?{{time()}}" rel="stylesheet" type="text/css" >
    
    
    <link href="{{asset('/css/extra-sleep.css')}}?{{time()}}" rel="stylesheet" type="text/css" >
    */-->

<script>
        $(document).ready(function()){
            $('[data-toggle="tooltip"]').tooltip({'placement': 'top'});
        });
</script>

<script>
 
    $('.question').hide()
 
    $question_shown = $('.question').first().show();
 
    $('.next').click(function(){
        $('.question').hide()
        $question_shown = $question_shown.next().show();
    });
 
    $('.previous').click(function(){
        $('.question').hide()
        $question_shown = $question_shown.prev().show();
    });
</script>