<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuratMasukModel;

class SuratMasukController extends Controller
{
    protected $SmM;

    public function __construct()
    {
        $this->SmM = new SuratMasukModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Surat Masuk',
            'surat_masuk' => $this->SmM->allData(),
        ];
        return view('admin/pemrosesan/v_sm', $data);
    }

    public function detail($id)
    {
        if($this->SmM->detailData($id) === null)
        {
            abort(404);
        }
        $i = 0;
        $data = [
            'title'     => 'Detail Surat Masuk',
            'sm' => $this->SmM->detailData($id),
            'no' => $i  
        ];
        return view('admin/pemrosesan/v_sm_detail', $data);
    }
    
    public function insert()
    {
        $data = [
            'title' => 'Tambah Surat Masuk baru',
            'jenis_surat' => $this->SmM->kodeArsipSm()
        ];

        return view('admin/pemrosesan/v_sm_insert', $data);
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
        $file->move(public_path('surat_masuk'), $namaFile);
        $data = [
            'id_arsip' => $request->id_arsip,
            'tgl_terima' => $request->tgl_terima,
            'nmr_st' => $request->nmr_st, 
            'tgl_st' => $request->tgl_st,
            'isi' => $request->isi,
            'disposisi' => $request->disposisi,
            'file' => $namaFile
        ];

        $this->SmM->inserData($data);
        return redirect()->route('surat-masuk')->with('store', 'data berhasil ditambahkan');
    }

    public function edit($id){
        $data = [
            'title' => 'Edit Surat Masuk',
            'sm' => $this->SmM->detailData($id),
            'jenis_surat' => $this->SmM->kodeArsipSm()
        ];
        return view('admin/pemrosesan/v_sm_edit', $data);
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
        if($file !== null){
            $namaFile = time() . '.' . $file->extension();
            $fileLama = $request->file_lama;
            $file->move(public_path('surat_masuk'), $namaFile);
            $data = [
                'id_arsip' => $request->id_arsip,
                'tgl_terima' => $request->tgl_terima,
                'nmr_st' => $request->nmr_st, 
                'tgl_st' => $request->tgl_st,
                'isi' => $request->isi,
                'disposisi' => $request->disposisi,
                'file' => $namaFile
            ];
            unlink(public_path('surat_masuk/' . $fileLama ));
            $this->SmM->updateData($id, $data);
        }else{

            $data = [
                'id_arsip' => $request->id_arsip,
                'tgl_terima' => $request->tgl_terima,
                'nmr_st' => $request->nmr_st, 
                'tgl_st' => $request->tgl_st,
                'isi' => $request->isi,
                'disposisi' => $request->disposisi
            ];
    
            $this->SmM->updateData($id, $data);
        }
        return redirect()->route('surat-masuk')->with('update', 'data berhasil diubah');
    }

    public function delete($id)
    {
        $suratMasuk = $this->SmM->detailData($id);
        // if($suratMasuk !== null)
        // {
        //     unlink(public_path('surat_masuk/'. $suratMasuk->file));
        // }
        // $this->SmM->deleteData($id);
        return redirect()->route('surat-masuk')->with('destroy', 'data berhasil dihapus');
    }

    public function smReport()
    {
        $data = [
            'title' => 'Laporan Surat Masuk'
        ];
        return view('admin/laporan/v_lp_sm', $data);
    }

    public function sReport($fromDate, $toDate)
    {
        $data = [
            'title' => 'Data Laporan Surat Masuk',
            'results' => $this->SmM->findReport($fromDate, $toDate),
            'from'  => $fromDate,
            'to'    => $toDate
        ];

        return view('admin/laporan/v_data_sm', $data);
    }

    public function print($fromDate, $toDate)
    {
        $data = [
            'surat_masuk' => $this->SmM->findReport($fromDate, $toDate)
        ];

        return view('admin/laporan/v_print_sm', $data);
    }
}
