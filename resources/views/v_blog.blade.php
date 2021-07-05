@extends('layouts.app')
@section('title', 'Ippmp | blog')
@section('content')
    <section class="blog-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @foreach ($berita as $row)
                        <div class="blog-single-item">
                            <div class="blog-img_block">
                                <img src="{{ asset('theme/images/' . $row->tulisan_gambar) }}" class="img-fluid"
                                    alt="blog-img" />
                                <div class="blog-date">
                                    <span>{{ date('d-m-Y', strtotime($row->tulisan_tanggal)) }}</span>
                                </div>
                            </div>
                            <div class="blog-tiltle_block">
                                <h4><a href="{{ url('artikel/' . $row->tulisan_slug) }}" target="_blank">{{ $row->tulisan_judul }}</a>
                                </h4>
                                <h6>
                                    <a href="#">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <span>{{ $row->tulisan_author }}</span>
                                    </a> |
                                    <a href="#"><i class="fa fa-tags"
                                            aria-hidden="true"></i><span>{{ $row->tulisan_kategori_nama }}</span></a>
                                </h6>
                                {{ \Illuminate\Support\Str::limit($row->tulisan_isi, 10) }}
                                <div class="blog-icons">
                                    <div class="blog-share_block">
                                        <a href="{{ url('artikel/' . $row->tulisan_slug) }}" target="_blank">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- <nav>
                        {{
                        error_reporting(0);
                        echo $page;
                        }}
                    </nav> --}}
                </div>
                <div class="col-md-4">
                    <form action="{{ url('blog/search') }}" method="get">
                        <input type="text" name="keyword" placeholder="Search" class="blog-search" required>
                        <button type="submit" class="btn btn-warning btn-blogsearch">SEARCH</button>
                    </form>
                    <div class="blog-category_block">
                        <h3>Kategori</h3>
                        <ul>
                            @foreach ($kategori as $row)
                                <li><a href="{{ url('blog/kategori/' . str_replace(' ', '-', $row->kategori_nama)) }}">{{ $row->kategori_nama }}<i
                                            class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- <div class="blog-featured_post">
                        <h3>Populer</h3>
                        @foreach ($populer as $row)
                        <div class="blog-featured-img_block">
                            <img width="35%"
                                src="{{asset('theme/images/' . $row->tulisan_gambar)}}" class="img-fluid" alt="blog-featured-img">
                            <h5><a
                                    href="{{url('artikel/' . $row->tulisan_slug)}}">{{\Illuminate\Support\Str::limit($row->tulisan_judul, 3)}}</a></h5>
                            <p>{{\Illuminate\Support\Str::limit($row->tulisan_isi, 5)}}</p>
                        </div>
                        <hr>
                        @endforeach
                    </div> --}}

                </div>
            </div>
        </div>
    </section>
@endsection
