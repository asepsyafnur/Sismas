@extends('admin/templates/v_default')
@section('title', 'Ippmp | kategori')
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
            <div class="col-md-12">
                @if(session('store'))
                <div class="flash" data-update="{{session('store')}}"></div>
                @elseif(session('update'))
                <div class="flash" data-update="{{session('update')}}"></div>
                @elseif(session('destroy'))
                <div class="flash" data-destroy="{{session('destroy')}}"></div>
                @endif
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title text-bold">{{ $title }}</h3>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-sm btn-primary" data-target="#add" data-toggle="modal"><i class="fas fa-file-upload"></i> Tambah Kategori</button>
                        <table id="example1" class="table table-no-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kategori as $key => $row)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td width="80%">{{ $row->kategori_nama }}</td>
                                    <td class="d-flex justify-content-around">
                                        @if(auth()->user()->level == 'humas' || auth()->user()->level == 'admin')
                                        <button type="button" title="Edit" class="btn btn-sm btn-warning" data-target="#edit{{$row->kategori_id}}" data-toggle="modal"><i class="fas fa-edit"></i></button>
                                        <form action="{{ url('admin/kategori/' . $row->kategori_id) }}" method="post" class="ml-2">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')" title="Hapus"><i class="fas fa-trash"></i></button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- Modal Tambah-->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/kategori')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" name="kategori_nama" id="kategori" class="form-control" placeholder="Masukkan kategori" value="{{ old('kategori_nama') }}">
                        @error('kategori_nama')
                        <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Kategori-->
@foreach($kategori as $key => $row)
<div class="modal fade" id="edit{{$row->kategori_id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/kategori/' . $row->kategori_id)}}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="_method" value="PUT" />
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" name="kategori_nama" id="kategori" class="form-control" value="{{ $row->kategori_nama }}">
                        @error('kategori_nama')
                        <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
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
        } else if (store) {
            let timerInterval
            Swal.fire({
                position: 'top-end',
                title: 'Post!',
                text: store,
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
    })
</script>
@endSection('script')