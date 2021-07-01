@extends('admin/templates/v_default')
@section('title', 'Ippmp | surat-keluar')
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
                        @if(auth()->user()->level == 'sekretaris' || auth()->user()->level == 'admin')
                        <form action="{{ url('surat-keluar/'. $sk->id )}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $sk->id }}" />
                            <input type="hidden" name="file_lama" value="{{ $sk->file }}" />
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="nomor-sk">Nomor Surat</label>
                                    <input type="text" class="form-control" name="nmr_st" id="nomor-sk" value="{{ $sk->nmr_st }}" />
                                    @error('nmr_st')
                                        <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="tgl-st">Tanggal Surat</label>
                                    <input type="date" class="form-control" name="tgl_st" id="tgl-st" value="{{ $sk->tgl_st }}" />
                                    @error('tgl_st')
                                        <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="arsip">Kode Arsip</label>
                                    <select name="id_arsip" class="form-control">
                                        <option value="">-- Pilih Kode Arsip --</option>
                                        @foreach($jenis_surat as $key => $js)
                                        <option value="{{ $js->id_arsip }}" {{($js->id_arsip == $sk->id_arsip) ? 'selected' : '' }}>{{ $js->kode }} - {{ $js->kode_arsip }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_arsip')
                                        <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col">
                                    <label for="perihal">Perihal</label>
                                    <input type="text" class="form-control" id="perihal" name="isi" id="perihal" value="{{ $sk->isi }}" />
                                    @error('isi')
                                        <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="tgl-terima">Tanggal Terima</label>
                                    <input type="date" class="form-control" name="tgl_terima" id="tgl-terima" value="{{ $sk->tgl_terima }}" />
                                    @error('tgl_terima')
                                        <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="disposisi">Disposisi</label>
                                    <input type="text" class="form-control" id="disposisi" name="disposisi" id="disposisi" value="{{ $sk->disposisi }}" />
                                    @error('disposisi')
                                        <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col">
                                    <div class="dragarea"></div>
                                    <label for="file">Lampiran</label>
                                    <input type="file" class="form-control" name="file" id="file" />
                                    @error('file')
                                        <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="divider">
                            <div class="form-group d-flex justify-content-between">
                                <a href="{{ url('surat-keluar') }}" class="btn btn-sm btn-secondary"><< Kembali</a>
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </div>
                            
                        </form>
                        @else
                        <h1>ANDA TIDAK MEMILIKI HAK AKSES UNTUK KE HALAMAN INI</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endSection