@extends('admin/templates/v_default')
@section('title', 'Ippmp | laporan sk')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 m-auto">
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title text-bold"><i class="fas fa-file-upload"></i> {{ $title }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row text-bold">
                            <div class="col-5">
                                <span>Dari tanggal</span>
                            </div>
                            <div class="col-5">
                                <span>Sampai tanggal</span>
                            </div>
                        </div>
                            <div class="form-row align-items-center">
                                <div class="col-5">
                                    <input type="date" class="form-control" name="from" id="from" />
                                </div>
                                <div class="col-5">
                                    <input type="date" class="form-control" name="to" id="to" />
                                </div>
                                <div class="col">
                                    <a href="" class="btn btn-default w-100" id="search">Cari</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endSection('content')
@section('script')
<script>
    var base_url = window.location.origin;
    $(document).ready(function(){
        $('#search').on('click', function(){
            var from = $('#from').val();
            var to = $('#from').val();
            $(this).attr('href', `${base_url}/laporan-sk/data/${from}/${to}`);
        });
    });
</script>
@endSection('script')