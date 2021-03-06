@extends('admin/templates/v_default')
@section('title', 'Ippmp | About')
@section('link')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets_dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets_dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets_dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<!-- sweetalert2 -->
<link rel="stylesheet" href="{{ asset('assets_dashboard/plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection('link')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-12 col-md-8 mx-auto">
                @if(session('update'))
                <div class="flash" data-update="{{session('update')}}"></div>
                @elseif(session('destroy'))
                <div class="flash" data-destroy="{{session('destroy')}}"></div>
                @endif
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title text-bold">{{ $title }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ url('admin/about/'. $about->id )}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nama">Nama Ketua</label>
                                    <input type="text" class="form-control" name="nama" id="nama" value="{{ $about->nama }}" />
                                    @error('nama')
                                    <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="foto">Foto Ketua</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="foto" id="foto">
                                        @error('foto')
                                        <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                                        @enderror
                                        <label class="custom-file-label" for="gambar">{{$about->foto}}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="desc">Deskripsi</label>
                                    <textarea name="sambutan_home" id="desc" cols="30" rows="7" class="form-control">{{$about->sambutan_home}}</textarea>
                                    @error('sambutan_home')
                                    <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="divider">
                            <div class="form-group d-flex justify-content-end">
                                <button type="submit" class="btn btn-sm btn-primary">Publish</button>
                            </div>

                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <!-- /.row -->
        </div><!-- /.container-fluid -->
</section>
@endSection('content')
@section('script')
<!-- DataTables  & Plugins -->
<script src="{{asset('assets_dashboard/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets_dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets_dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets_dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets_dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets_dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<!-- sweetalert2 -->
<script src="{{ asset('assets_dashboard/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        const destroy = $('.flash').data('destroy');
        const store = $('.flash').data('store');
        const update = $('.flash').data('update');
        if (destroy) {
            let timerInterval
            Swal.fire({
                position: 'top-end',
                title: 'Deleted!',
                text: destroy,
                timer: 2000,
                timerProgressBar: true,
                icon: 'success',
                didOpen: () => {
                    Swal.showLoading()
                    timerInterval = setInterval(() => {
                        const content = Swal.getHtmlContainer()
                        if (content) {
                            const b = content.querySelector('b')
                            if (b) {
                                b.textContent = Swal.getTimerLeft()
                            }
                        }
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            })
        } else if (update) {
            let timerInterval
            Swal.fire({
                position: 'top-end',
                title: 'Update!',
                text: update,
                timer: 2000,
                timerProgressBar: true,
                icon: 'success',
                didOpen: () => {
                    Swal.showLoading()
                    timerInterval = setInterval(() => {
                        const content = Swal.getHtmlContainer()
                        if (content) {
                            const b = content.querySelector('b')
                            if (b) {
                                b.textContent = Swal.getTimerLeft()
                            }
                        }
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            })
        }
    });
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

</script>
@endSection('script')