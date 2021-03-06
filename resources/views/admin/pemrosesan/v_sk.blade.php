@extends('admin/templates/v_default')
@section('title', 'Ippmp | surat-keluar')
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
      <div class="col-12">
        @if(session('store'))
        <div class="flash" data-store="{{session('store')}}"></div>
        @elseif(session('update'))
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
            <a href="{{ url('surat-keluar/insert') }}" class="btn btn-sm btn-primary"><i class="fas fa-file-upload"></i> Surat Keluar Baru</a>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Arsip</th>
                  <th>Tanggal Terima</th>
                  <th>Nomor Surat</th>
                  <th>Tanggal Surat</th>
                  <th>Isi</th>
                  <th>Disposisi ke</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($surat_keluar as $key => $sk)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $sk->kode }}</td>
                  <td>{{ $sk->tgl_terima  }}</td>
                  <td>{{ $sk->nmr_st }}</td>
                  <td>{{ $sk->tgl_st }}</td>
                  <td>{{ $sk->isi }}</td>
                  <td>{{ $sk->disposisi }}</td>
                  <td>
                    <a href="{{ url('surat-keluar/detail/' . $sk->id) }}" title="Lihat" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></a>
                    @if(auth()->user()->level == 'sekretaris' || auth()->user()->level == 'admin')
                    <a href="{{ url('surat-keluar/' . $sk->id ) }}" title="Edit" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                    <form action="{{ url('surat-keluar/' . $sk->id) }}" method="post" class="d-inline">
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
    } else if (store) {
      let timerInterval
      Swal.fire({
        position: 'top-end',
        title: 'Store!',
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
  })
</script>
@endSection('script')