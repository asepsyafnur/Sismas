@extends('admin/templates/v_default')
@section('title', 'Ippmp | surat-masuk')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title text-bold">{{ $title }}</h3>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="true">Detail</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="surat-tab" data-toggle="tab" href="#file" role="tab" aria-controls="file" aria-selected="false">Lihat Surat</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                                <div class="container">
                                    <div class="row mt-3">
                                        <div class="col-3 text-bold">
                                            <p>Nomor Surat</p>
                                            <p>tanggal Surat</p>
                                            <p>Perihal</p>
                                            <p>Lampiran</p>
                                        </div>
                                        <div class="col-4">
                                            <p>: {{ $sm->nmr_st }}</p>
                                            <p>: {{ $sm->tgl_st }}</p>
                                            <p>: {{ $sm->isi }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <table class="table table-bordered table-striped">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Berkas</th>
                                                    <th>Aksi</th>
                                                </tr>
                                                <tr>
                                                    <td>{{ $no + 1 }}</td>
                                                    <td>{{ $sm->file }}</td>
                                                    <td>
                                                        <a href="#"><i class="fas fa-download"></i></a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                            <div class="tab-pane fade" id="file" role="tabpanel" aria-labelledby="surat-tab">
                                <iframe src="{{ public_path('surat_masuk\1624237713.pdf') }}" style="width: 100%;height: 100%;border: none;"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endSection