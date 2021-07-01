@extends('admin/templates/v_default')
@section('title', 'Ippmp | laporan sm')
@section('link')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets_dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets_dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets_dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection('link')
@section('content')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-header">
            <h3 class="card-title text-bold">{{ $title }}</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <a href="{{ url('laporan-sk/print/'.$from.'/'.$to) }}" rel="noopener" target="_blank" class="btn btn-default mb-3"><i class="fas fa-print"></i> Print</a>
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
                </tr>
              </thead>
              <tbody>
                @foreach($results as $key => $result)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $result->kode }}</td>
                  <td>{{ $result->tgl_terima  }}</td>
                  <td>{{ $result->nmr_st }}</td>
                  <td>{{ $result->tgl_st }}</td>
                  <td>{{ $result->isi }}</td>
                  <td>{{ $result->disposisi }}</td>
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
@endSection
@section('script')
<!-- DataTables  & Plugins -->
<script src="{{asset('assets_dashboard/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets_dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets_dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets_dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets_dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets_dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
@endSection('script')