<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="shorcut icon" href="{{url('theme/images/icon.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('theme/css/bootstrap.min.css')}}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('theme/css/font-awesome.min.css')}}">
    <!-- Simple Line Font -->
    <link rel="stylesheet" href="{{url('theme/css/simple-line-icons.css')}}">
    <!-- Slider / Carousel -->
    <link rel="stylesheet" href="{{url('theme/css/slick.css')}}">
    <link rel="stylesheet" href="{{url('theme/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{url('theme/css/owl.carousel.min.css')}}">
    <!-- Main CSS -->
    <link href="{{url('theme/css/style.css')}}" rel="stylesheet">
</head>

<body>

    @include('layouts/v_nav')

    @yield('content')


    <!-- jQuery, Bootstrap JS. -->
    <script src="{{url('theme/js/jquery.min.js')}}"></script>
    <script src="{{url('theme/js/tether.min.js')}}"></script>
    <script src="{{url('theme/js/bootstrap.min.js')}}"></script>
    <!-- Plugins -->
    <script src="{{url('theme/js/slick.min.js')}}"></script>
    <script src="{{url('theme/js/waypoints.min.js')}}"></script>
    <script src="{{url('theme/js/counterup.min.js')}}"></script>
    <script src="{{url('theme/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('theme/js/validate.js')}}"></script>
    <script src="{{url('theme/js/tweetie.min.js')}}"></script>
    <!-- Subscribe -->
    <script src="{{url('theme/js/subscribe.js')}}"></script>
    <!-- Script JS -->
    <script src="{{url('theme/js/script.js')}}"></script>
</body>

</html>