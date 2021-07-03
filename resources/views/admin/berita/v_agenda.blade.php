@extends('admin/templates/v_default')
@section('title', 'Ippmp | agenda')
@section('link')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets_dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets_dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets_dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<!-- sweetalert2 -->
<link rel="stylesheet" href="{{ asset('assets_dashboard/plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
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
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-sm btn-primary" data-target="#add" data-toggle="modal"><i class="fas fa-file-upload"></i> Tambah Agenda</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-no-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Agenda</th>
                                    <th>Tanggal</th>
                                    <th>Tempat</th>
                                    <th>Waktu</th>
                                    <th>Author</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($agenda as $row)
                                <tr>
                                    <td>{{ date('d/m/Y', strtotime($row->agenda_tanggal)) }}</td>
                                    <td>{{ $row->agenda_nama }}</td>
                                    <td>{{ date('d-m-Y', strtotime($row->agenda_mulai)) . ' s/d ' . date('d-m-Y', strtotime($row->agenda_selesai)) }}</td>
                                    <td>{{ $row->agenda_tempat }}</td>
                                    <td>{{ $row->agenda_waktu }}</td>
                                    <td>{{ $row->agenda_author }}</td>
                                    <td class="d-flex justify-content-around">
                                        @if(auth()->user()->level == 'humas' || auth()->user()->level == 'admin')
                                        <button type="button" title="Edit" class="btn btn-sm btn-warning" data-target="#edit{{$row->agenda_id}}" data-toggle="modal"><i class="fas fa-edit"></i></button>
                                        <form action="{{ url('admin/agenda/' . $row->agenda_id) }}" method="post" class="ml-2">
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Agenda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/agenda')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="agenda" class="col-md-2 my-auto">Nama Agenda</label>
                        <div class="col-md-10">
                            <input type="text" name="agenda_nama" id="agenda" class="form-control" placeholder="Nama agenda" value="{{ old('agenda_nama') }}">
                            @error('agenda_nama')
                            <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-md-2 my-auto">Deskripsi</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="agenda_deskripsi" placeholder="Deskripsi ..." id="deskripsi" cols="30" rows="3">{{ old('agenda_deskripsi') }}</textarea>
                            @error('agenda_deskripsi')
                            <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mulai" class="col-md-2 my-auto">Mulai</label>
                        <div class="col-md-10">
                            <input type="date" name="agenda_mulai" id="mulai" class="form-control" value="{{ old('agenda_mulai') }}">
                            @error('agenda_mulai')
                            <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="selesai" class="col-md-2 my-auto">Selesai</label>
                        <div class="col-md-10">
                            <input type="date" name="agenda_selesai" id="selesai" class="form-control" value="{{ old('agenda_selesai') }}">
                            @error('agenda_selesai')
                            <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tempat" class="col-md-2 my-auto">Tempat</label>
                        <div class="col-md-10">
                            <input type="text" name="agenda_tempat" id="tempat" class="form-control" placeholder="Tempat" value="{{ old('agenda_tempat') }}">
                            @error('agenda_tempat')
                            <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="waktu" class="col-md-2 my-auto">Waktu</label>
                        <div class="col-md-10">
                            <input type="text" name="agenda_waktu" id="waktu" class="form-control" placeholder="Contoh: 07.30-12.00 WIB" value="{{ old('agenda_waktu') }}">
                            @error('agenda_waktu')
                            <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan" class="col-md-2 my-auto">Keterangan</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="agenda_keterangan" placeholder="Keterangan ..." id="keterangan" cols="30" rows="2">{{ old('agenda_keterangan') }}</textarea>
                            @error('agenda_keterangan')
                            <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>
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

<!-- Modal Edit agenda-->
@foreach($agenda as $key => $row)
<div class="modal fade" id="edit{{$row->agenda_id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit agenda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/agenda/' . $row->agenda_id)}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="agenda" class="col-md-2 my-auto">Nama Agenda</label>
                        <div class="col-md-10">
                            <input type="text" name="agenda_nama" id="agenda" class="form-control" placeholder="Nama agenda" value="{{ (old('agenda_nama')) ? old('agenda_nama') : $row->agenda_nama }}">
                            @error('agenda_nama')
                            <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-md-2 my-auto">Deskripsi</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="agenda_deskripsi" placeholder="Deskripsi ..." id="deskripsi" cols="30" rows="3">{{ (old('agenda_deskripsi')) ? old('agenda_deskripsi') : $row->agenda_deskripsi }}</textarea>
                            @error('agenda_deskripsi')
                            <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mulai" class="col-md-2 my-auto">Mulai</label>
                        <div class="col-md-10">
                            <input type="date" name="agenda_mulai" id="mulai" class="form-control" value="{{ (old('agenda_mulai')) ? old('agenda_mulai') : $row->agenda_mulai }}">
                            @error('agenda_mulai')
                            <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="selesai" class="col-md-2 my-auto">Selesai</label>
                        <div class="col-md-10">
                            <input type="date" name="agenda_selesai" id="selesai" class="form-control" value="{{ (old('agenda_selesai')) ? old('agenda_selesai') : $row->agenda_selesai }}">
                            @error('agenda_selesai')
                            <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tempat" class="col-md-2 my-auto">Tempat</label>
                        <div class="col-md-10">
                            <input type="text" name="agenda_tempat" id="tempat" class="form-control" placeholder="Tempat" value="{{ (old('agenda_tempat')) ? old('agenda_tempat') : $row->agenda_tempat }}">
                            @error('agenda_tempat')
                            <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="waktu" class="col-md-2 my-auto">Waktu</label>
                        <div class="col-md-10">
                            <input type="text" name="agenda_waktu" id="waktu" class="form-control" placeholder="Contoh: 07.30-12.00 WIB" value="{{ (old('agenda_waktu')) ? old('agenda_waktu') : $row->agenda_waktu }}">
                            @error('agenda_waktu')
                            <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan" class="col-md-2 my-auto">Keterangan</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="agenda_keterangan" placeholder="Keterangan ..." id="keterangan" cols="30" rows="2">{{ (old('agenda_keterangan')) ? old('agenda_keterangan') : $row->agenda_keterangan }}</textarea>
                            @error('agenda_keterangan')
                            <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>
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
@endSection
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
@endSection