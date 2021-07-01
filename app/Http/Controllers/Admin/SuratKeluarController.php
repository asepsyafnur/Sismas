<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuratKeluarModel;

class SuratKeluarController extends Controller
{
    protected $SkM;

    public function __construct()
    {
        $this->SkM = new SuratKeluarModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Surat Keluar',
            'surat_keluar' => $this->SkM->allData(),
        ];
        return view('admin/pemrosesan/v_sk', $data);
    }

    public function detail($id)
    {
        if ($this->SkM->detailData($id) === null) {
            abort(404);
        }
        $i = 0;
        $data = [
            'title'     => 'Detail Surat Keluar',
            'sk' => $this->SkM->detailData($id),
            'no' => $i
        ];
        return view('admin/pemrosesan/v_sk_detail', $data);
    }

    public function insert()
    {
        $data = [
            'title' => 'Tambah Surat Keluar baru',
            'jenis_surat' => $this->SkM->kodeArsipSk()
        ];

        return view('admin/pemrosesan/v_sk_insert', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_arsip' => 'required',
            'tgl_terima' => 'required',
            'nmr_st' => 'required',
            'tgl_st' => 'required',
            'isi' => 'required',
            'disposisi' => 'required',
            'file' => 'required|file|max:1024'
        ], [
            'id_arsip.required' => '*kode arsip tidak boleh kosong',
            'tgl_terima.required' => '*tanggal diterima tidak boleh kosong',
            'nmr_st.required' => '*nomor surat tidak boleh kosong',
            'tgl_st.required' => '*tanggal surat tidak boleh kosong',
            'isi.required' => '*isi surat tidak boleh kosong',
            'disposisi.required' => '*disposisi tidak boleh kosong',
            'file.required' => '*silahkan upload surat',
            'file.max' => '*ukuran file terlalu besar',

        ]);
        $file = $request->file;
        $namaFile = time() . '.' . $file->extension();
        $file->move(public_path('surat_keluar'), $namaFile);
        $data = [
            'id_arsip' => $request->id_arsip,
            'tgl_terima' => $request->tgl_terima,
            'nmr_st' => $request->nmr_st,
            'tgl_st' => $request->tgl_st,
            'isi' => $request->isi,
            'disposisi' => $request->disposisi,
            'file' => $namaFile
        ];

        $this->SkM->inserData($data);
        return redirect()->route('surat-keluar')->with('store', 'data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Surat Keluar',
            'sk' => $this->SkM->detailData($id),
            'jenis_surat' => $this->SkM->kodeArsipSk()
        ];
        return view('admin/pemrosesan/v_sk_edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id_arsip' => 'required',
            'tgl_terima' => 'required',
            'nmr_st' => 'required',
            'tgl_st' => 'required',
            'isi' => 'required',
            'disposisi' => 'required',
            'file' => 'file|max:5020'
        ], [
            'id_arsip.required' => '*kode arsip tidak boleh kosong',
            'tgl_terima.required' => '*tanggal diterima tidak boleh kosong',
            'nmr_st.required' => '*nomor surat tidak boleh kosong',
            'tgl_st.required' => '*tanggal surat tidak boleh kosong',
            'isi.required' => '*isi surat tidak boleh kosong',
            'disposisi.required' => '*disposisi tidak boleh kosong',
            'file.required' => '*silahkan upload surat',
            'file.max' => '*ukuran file terlalu besar',

        ]);
        $id = $request->id;
        $file = $request->file;
        if ($file !== null) {
            $namaFile = time() . '.' . $file->extension();
            $fileLama = $request->file_lama;
            $file->move(public_path('surat_keluar'), $namaFile);
            $data = [
                'id_arsip' => $request->id_arsip,
                'tgl_terima' => $request->tgl_terima,
                'nmr_st' => $request->nmr_st,
                'tgl_st' => $request->tgl_st,
                'isi' => $request->isi,
                'disposisi' => $request->disposisi,
                'file' => $namaFile
            ];
            unlink(public_path('surat_keluar/' . $fileLama));
            $this->SkM->updateData($id, $data);
        } else {

            $data = [
                'id_arsip' => $request->id_arsip,
                'tgl_terima' => $request->tgl_terima,
                'nmr_st' => $request->nmr_st,
                'tgl_st' => $request->tgl_st,
                'isi' => $request->isi,
                'disposisi' => $request->disposisi
            ];

            $this->SkM->updateData($id, $data);
        }
        return redirect()->route('surat-keluar')->with('update', 'data berhasil diubah');
    }

    public function destroy($id)
    {
        $suratKeluar = $this->SkM->detailData($id);
        if ($suratKeluar !== null) {
            unlink(public_path('surat_keluar/' . $suratKeluar->file));
        }
        $this->SkM->deleteData($id);
        return redirect()->route('surat-keluar')->with('destroy', 'data berhasil dihapus');
    }

    public function skReport()
    {
        $data = [
            'title' => 'Laporan Surat Keluar'
        ];
        return view('admin/laporan/v_lp_sk', $data);
    }

    public function sReport($fromDate, $toDate)
    {
        $data = [
            'title' => 'Data Laporan Surat Keluar',
            'results' => $this->SkM->findReport($fromDate, $toDate),
            'from'  => $fromDate,
            'to'    => $toDate
        ];

        return view('admin/laporan/v_data_sk', $data);
    }

    public function print($fromDate, $toDate)
    {
        $data = [
            'surat_keluar' => $this->SkM->findReport($fromDate, $toDate)
        ];

        return view('admin/laporan/v_print_sk', $data);
    }
}
