@extends('layouts.app')
@section('title', 'Ippmp | '. $detail->tulisan_judul)
@section('content')
    <section class="blog-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-img_block">
                        <img src="{{ asset('theme/images/' . $detail->tulisan_gambar) }}" class="img-fluid" alt="blog-img">
                        <div class="blog-date">
                            <span>{{ date('d-m-Y', strtotime($detail->tulisan_tanggal)) }}</span>
                        </div>
                    </div>
                    <div class="blog-tiltle_block">
                        <h4><a href="{{ url('artikel/' . $detail->tulisan_slug) }}">{{ $detail->tulisan_judul }}</a></h4>
                        <h6> <a href="#"><i class="fa fa-user"
                                    aria-hidden="true"></i><span>{{ $detail->tulisan_author }}</span> </a> | <a href="#"><i
                                    class="fa fa-tags"
                                    aria-hidden="true"></i><span>{{ $detail->tulisan_kategori_nama }}</span></a></h6>
                        {{ $detail->tulisan_isi }}
                    </div>
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
                </div>
            </div>
        </div>
    </section>
@endsection
