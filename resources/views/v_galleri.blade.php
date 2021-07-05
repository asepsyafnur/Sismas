@extends('layouts.app')
@section('title', 'Ippmp | galleri')
@section('link')
<link rel="stylesheet" href="{{url('theme/css/jquery.fancybox.min.css')}}">
<style type="text/css">
    .item{
        transition: .5s ease-in-out;
    }
    .item:hover{
        filter: brightness(80%);
    }
</style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="item col-sm-6 col-md-4 mb-3">
                <a href="theme/images/img.jpg" class="fancybox" data-fancybox="gallery1">
                    <img src="theme/images/img.jpg" width="100%" height="100%">
                </a>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('theme/js/jquery.fancybox.min.js')}}"></script>
@endsection