@extends('layouts.app')
@section('title', 'Ippmp | Selamat datang di web kami')
@section('content')
<section class="row">
    <div class="slider_img layout_two">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                @foreach($slider as $slide)
                <div class="carousel-item">
                    <img class="d-block" src="{{url('theme/images/' . $slide->gambar)}}" alt="First slide">
                    <div class="carousel-caption d-md-block">
                        <div class="slider_title">
                            <h1>{{ $slide->title }}</h1>
                            <h4>{{ $slide->sub_title }}</h4>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <i class="icon-arrow-left fa-slider" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <i class="icon-arrow-right fa-slider" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>

<section class="clearfix about about-style2">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>Selamat Datang</h2>
                <p>{{$about->sambutan_home}}.</p>
            </div>
            <div class="col-md-4">
                <img src="{{url('theme/images/welcome.png')}}" class="img-fluid about-img" alt="#">
            </div>
        </div>
    </div>
</section>

<section class="our_courses">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Artikel Terbaru</h2>
            </div>
        </div>
        <div class="row">
          @foreach ($berita as $row)
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="courses_box mb-4">
                    <div class="course-img-wrap">
                        <img src="{{url('theme/images/'.$row->tulisan_gambar)}}" class="img-fluid" alt="courses-img">
                    </div>
                    <!-- // end .course-img-wrap -->
                    <a href="{{url('artikel/' . $row->tulisan_slug)}}" class="course-box-content">
                        <h3 style="text-align:center;">{{ $row->tulisan_judul }}</h3>
                    </a>
                </div>
            </div>
          @endforeach
        </div> <br>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="{{url('artikel')}}" class="btn btn-default btn-courses">View More</a>
            </div>
        </div>
    </div>
</section>

<section class="event">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Agenda</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($agenda as $row)
            <div class="col-md-6">
                <div class="event_date">
                    <div class="event-date-wrap">
                        <p>{{ date("d", strtotime($row->agenda_tanggal)) }}</p>
                        <span>{{ date("M. y", strtotime($row->agenda_tanggal)) }}</span>
                    </div>
                </div>
                <div class="date-description">
                    <h3><a href="{{ url('agenda') }}">{{ $row->agenda_nama }}</a></h3>
                    <p>{{ \Illuminate\Support\Str::limit($row->agenda_deskripsi, 50) }}</p>
                    <hr class="event_line">
                </div>
            </div>
            @endforeach;
        </div>
    </div>
</section>
@endsection
@section('script')
    <script>
        const item = document.querySelector('.carousel-item');
        item.classList.add('active');
    </script>
@endsection