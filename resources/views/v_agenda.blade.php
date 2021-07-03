@extends('layouts.app')
@section('title', 'Ippmp | About')
@section('content')
    <div class="container">
        <hr class="divider">
    </div>
    <section class="events">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="event-title">Agenda</h2>
                </div>
                <div class="col-md-8">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item nav-tab1">
                            <a class="nav-link tab-list active" data-toggle="tab" href="#upcoming-events" role="tab">Agenda
                                Terbaru </a>
                        </li>

                    </ul>
                </div>
            </div>
            <br>
            <div class="row">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="upcoming-events" role="tabpanel">
                        @foreach($agenda as $row)
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="event-date">
                                        <h4>{{date('d', strtotime($row->agenda_tanggal))}}</h4> <span>{{date('M Y',
                                            strtotime($row->agenda_tanggal))}}</span>
                                    </div>
                                    <span class="event-time">{{$row->agenda_waktu}}</span>
                                </div>
                                <div class="col-md-10">
                                    <div class="event-heading">
                                        <h3>{{$row->agenda_nama}}</h3>
                                        <p>{{$row->agenda_deskripsi}}</p>
                                    </div>
                                </div>
                            </div>
                            <hr class="event-underline">
                        </div>
                        @endforeach

                        {{-- <div class="col-md-12 text-center"> --}}
                            {{-- {{$page}} --}}
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
