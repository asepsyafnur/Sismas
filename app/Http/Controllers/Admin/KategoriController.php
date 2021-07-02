<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriModel;
use DateTime;

class KategoriController extends Controller
{
    protected $kategoriM;
    public function __construct()
    {
        $this->kategoriM = new KategoriModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Kategori Berita',
            'kategori' => $this->kategoriM->allData()
        ];
        return view('admin/berita/v_kategori', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_nama' => ['required', 'unique:kategori']
        ], [
            'kategori_nama.required' => '*wajib diisi',
            'kategori_nama.unique' =>  '*kategori yang anda masukkan sudah ada'
        ]);

        $data = [
            'kategori_nama' => $request->kategori_nama,
            'kategori_tanggal' => new DateTime()
        ];
        
        $this->kategoriM->insertData($data);
        return redirect()->route('kategori')->with('store', 'berhasil menambah kategori');
    }

    public function update(Request $request, $id)
    {
        $kategoriLama = $this->kategoriM->detailData($id);
        if($kategoriLama->kategori_nama !== $request->kategori_nama){
            $kategori = ['required'];
        }else{
            $kategori = ['required', 'unique:kategori'];
        }
        $request->validate([
            'kategori_nama' => $kategori,
        ], [
            'kategori_nama.required' => '*wajib diisi',
            'kategori_nama.unique' =>  '*kategori yang anda masukkan sudah ada'
        ]);

        $data = [
            'kategori_nama' => $request->kategori_nama,
            'kategori_tanggal' => new DateTime()
        ];

        $this->kategoriM->updateData($id, $data);
        return redirect()->route('kategori')->with('update', 'berhasil mengubah kategori');
    }

    public function destroy($id)
    {
        $this->kategoriM->deleteData($id);
        return redirect()->route('kategori')->with('destroy', 'berhasil menghapus kategori');

    }
}
