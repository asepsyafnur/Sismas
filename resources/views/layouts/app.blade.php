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

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="foot-logo">
                        <a href="{{ url('/') }}">
                            {{-- <img src="{{asset('assets_dashboard/dist/img/logo.jpg')}}" class="img-fluid" alt="footer_logo"> --}}
                            <h1>Logo</h1>
                        </a>
                        <p>{{date('Y')}} © copyright by <a href="https://www.instagram.com/asep_syfnr/" target="_blank">Ippmp kstmikdp</a>. <br>All rights reserved.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sitemap">
                        <h3>Menu Utama</h3>
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('about')}}">About</a></li>
                            <li><a href="{{url('artikel')}}">Blog </a></li>
                            <li><a href="{{url('galeri')}}">Gallery</a></li>
                            <li><a href="{{url('contact')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sitemap">
                        <h3>Explore</h3>
                        <ul>
                            <li><a href="{{url('guru')}}>">BPH</a></li>
                            <li><a href="{{url('agenda')}}">Agenda</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="address">
                        <h3>Hubungi Kami</h3>
                        <p><span>Sekretariat: </span> {{$address->alamat}}</p>
                        <p>Email : {{$address->email}}
                        <br> Phone : {{$address->telp}}</p>
                        <ul class="footer-social-icons">
                            <li><a href="https://web.facebook.com/Ippmstmikdp/?_rdc=1&_rdr" target="_blank"><i class="fa fa-facebook fa-fb" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.instagram.com/ippmp_k_stmikdp/" target="_blank"><i class="fa fa-instagram fa-in" aria-hidden="true"></i></a></li>
                            <li><a href="https://twitter.com/ippm_stmik" target="_blank"><i class="fa fa-twitter fa-tw" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
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
    @yield('script')
</body>

</html>