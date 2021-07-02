@extends('admin/templates/v_default')
@section('title', 'Ippmp | update berita')
@section('link')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets_dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets_dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets_dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<!-- sweetalert2 -->
<link rel="stylesheet" href="{{ asset('assets_dashboard/plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection('link')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
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
                        <div class="card-body">
                            <form action="{{ url('list-berita/'. $berita->tulisan_id )}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="gambar_lama" value="{{$berita->tulisan_gambar}}">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="judul">Judul</label>
                                        <input type="judul" class="form-control" name="tulisan_judul" id="judul" value="{{ $berita->tulisan_judul }}" />
                                        @error('tulisan_judul')
                                        <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="isi">Berita</label>
                                        <textarea class="form-control" name="tulisan_isi" id="isi" cols="30" rows="10">{{$berita->tulisan_isi}}</textarea>
                                        @error('tulisan_isi')
                                        <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="kategori">Kategori</label>
                                                <select id="kategori" name="tulisan_kategori" class="form-control">
                                                    @foreach($kategori as $key => $row)
                                                    <option value="{{ $row->kategori_id }}">{{$row->kategori_nama}}</option>
                                                    @endforeach
                                                </select>
                                                @error('tulisan_kategori')
                                                <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="gambar">Gambar</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="tulisan_gambar" id="gambar">
                                                    @error('tulisan_gambar')
                                                    <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                                                    @enderror
                                                    <label class="custom-file-label" for="gambar">{{$berita->tulisan_gambar}}</label>
                                                </div>
                                            </div>
                                        </div>
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

<!-- /.content -->
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
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            // "buttons": ["excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
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