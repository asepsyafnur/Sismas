@extends('admin/templates/v_default')
@section('title', 'Ippmp | surat-keluar')
@section('link')
<link rel="stylesheet" href="{{asset('assets_dashboard/plugins/dropzone/dropzone.min.css')}}">
@endsection('link')
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
                        <form action="{{ url('surat-keluar/store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="nomor-sk">Nomor Surat</label>
                                    <input type="text" id="nst" class="form-control" name="nmr_st" value="{{ old('nmr_st') }}" />
                                    @error('nmr_st')
                                    <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="tgl-st">Tanggal Surat</label>
                                    <input type="date" id="tglst" class="form-control" name="tgl_st" value="{{ old('tgl_st') }}" />
                                    @error('tgl_st')
                                    <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="arsip">Kode Arsip</label>
                                    <select id="karsip" name="id_arsip" class="form-control">
                                        <option value="">-- Pilih Kode Arsip --</option>
                                        @foreach($jenis_surat as $key => $js)
                                        <option value="{{ $js->id_arsip }}">{{ $js->kode }} - {{ $js->kode_arsip }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_arsip')
                                    <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col">
                                    <label for="perihal">Perihal</label>
                                    <input type="text" id="hal" class="form-control" name="isi" value="{{ old('isi') }}"/>
                                    @error('isi')
                                    <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="tgl-terima">Tanggal Terima</label>
                                    <input type="date" class="form-control" name="tgl_terima" id="tgltrim" value="{{ old('tgl_terima') }}"/>
                                    @error('tgl_terima')
                                    <span class="text-danger" id="tgltrim" style="font-size: 13px;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="disposisi">Disposisi</label>
                                    <input type="text" class="form-control" name="disposisi" id="disposisi" />
                                    @error('disposisi')
                                    <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <label class="control-label col-lg-3"><b>Lampiran</b></label>
                                <div class="col-lg-12">
                                    <div class="dropzone" id="myDropzone">
                                        <div class="dz-message">
                                            <h3> Klik atau Drop Lampiran disini</h3>
                                        </div>
                                    </div>
                                    <i style="color:red">*Lampiran wajib diisi</i>
                                </div>
                            </div> -->
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
                                <a href="{{ url('surat-keluar') }}" class="btn btn-sm btn-secondary">
                                    << Kembali</a>
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection('content')
@section('script')
<script src="{{asset('assets_dashboard/plugins/dropzone/dropzone.min.js')}}"></script>
<script>
 
</script>
@endsection('script')