<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print laporan</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets_dashboard/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets_dashboard/dist/css/adminlte.min.css') }}">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row mt-4">
                <div class="col-12">
                    <h5 class="page-header">
                        Laporan Surat Keluar
                    </h5>
                </div>
                <!-- /.col -->
            </div>

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Arsip</th>
                                <th>tanggal Diterima</th>
                                <th>Nomor Surat</th>
                                <th>Tanggal Surat</th>
                                <th>Perihal</th>
                                <th>Disposisi</th>
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>