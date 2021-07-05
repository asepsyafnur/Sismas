<div class="header-topbar">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-sm-8 col-md-9">
                <div class="header-top_address">
                    <div class="header-top_list">
                        <span class="icon-phone"></span>{{$address->telp}}
                    </div>
                    <div class="header-top_list">
                        <span class="icon-envelope-open"></span>{{$address->email}}
                    </div>
                    <div class="header-top_list">
                        <span class="icon-location-pin"></span>Sekretariat : {{$address->alamat}}
                    </div>
                </div>
                <div class="header-top_login2">
                    <a href="{{url('contact')}}">Hubungi Kami</a>
                </div>
            </div>
            {{-- <div class="col-xs-6 col-sm-4 col-md-3">
                <div class="header-top_login mr-sm-3">
                    <a href="{{url('contact')}}">Hubungi Kami</a>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<div data-toggle="affix">
    <div class="container nav-menu2">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar2 navbar-toggleable-md navbar-light bg-faded">
                    <button class="navbar-toggler navbar-toggler2 navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
                        <span class="icon-menu"></span>
                    </button>
                    <a href="{{url('/')}}" class="navbar-brand nav-brand2">
                        {{-- <img class="img img-responsive" width="200px;" src="{{asset('assets_dashboard/dist/img/logo.jpg')}}"> --}}
                        <h2>Logo</h2>
                    </a>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('about')}}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('blog')}}">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('agenda')}}">Agenda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('galeri')}}">Gallery</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>