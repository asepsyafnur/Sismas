@extends('layouts.app')
@section('title', 'Ippmp | Selamat datang di web kami')
@section('content')
    <section>
        <div class="slider_img layout_two">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block" src="{{url('theme/images/slider.jpg')}}" alt="First slide">
                    <div class="carousel-caption d-md-block">
                        <div class="slider_title">
                            <h1>Bepikir Kreaftif &amp; Inovatif</h1>
                            <h4>Bagi kami kreativitas merupakan gerbang masa depan.<br> kreativitas akan mendorong inovasi. <br> Itulah yang kami lakukan.</h4>
                            <div class="slider-btn">
                                <a href="{{url('artikel')}}" class="btn btn-default">Learn more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block" src="{{url('theme/images/slider-2.jpg')}}" alt="Second slide">
            <div class="carousel-caption d-md-block">
                <div class="slider_title">
                    <h1>Guru Bekualitas Tinggi</h1>
                    <h4>Guru merupakan faktor penting dalam proses belajar-mengajar.<br> Itulah kenapa kami mendatangkan guru-guru <br>terbaik dari berbagai penjuru.</h4>
                    <div class="slider-btn">
                        <a href="{{url('guru')}}" class="btn btn-default">Learn more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block" src="{{url('theme/images/slider-3.jpg')}}" alt="Third slide">
                    <div class="carousel-caption d-md-block">
                        <div class="slider_title">
                            <h1>Proses Belajar Interatif</h1>
                            <h4>Kami membuat proses belajar mengajar menjadi lebih interatif.<br> dengan demikian siswa lebih menyukai <br>proses belajar.</h4>
                            <div class="slider-btn">
                                <a href="{{url('galeri')}}" class="btn btn-default">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
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
               <h2>Welcome</h2>
               <p>Kami Menyambut baik terbitnya Website MSCHOOL yang baru , dengan harapan dipublikasinya website ini sekolah berharap : Peningkatan layanan pendidikan kepada siswa, orangtua, dan masyarakat pada umumnya semakin meningkat.</p>
            </div>
            <div class="col-md-4">
                <img src="{{url('theme/images/welcome.png')}}" class="img-fluid about-img" alt="#">
        </div>
</div>
</div>
</section>
@endsection