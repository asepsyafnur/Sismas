<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\BeritaModel;
use App\Models\KategoriModel;
use DateTime;

class BeritaController extends Controller
{
    protected $beritaM;
    protected $kategoriM;

    public function __construct()
    {
        $this->beritaM = new BeritaModel();
        $this->kategoriM = new KategoriModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'List Berita',
            'berita' => $this->beritaM->allData()
        ];
        return view('admin/berita/v_list', $data);
    }

    public function insert()
    {
        $data = [
            'title' => 'Post Berita',
            'kategori' => $this->kategoriM->allData(),
        ];
        return view('admin/berita/v_post', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tulisan_judul' => ['required', 'unique:tulisan'],
            'tulisan_isi' => ['required'],
            'tulisan_kategori' => ['required'],
            'tulisan_gambar' => ['required', 'mimes:jpg,jpeg,png', 'max:1024'],
        ], [
            'tulisan_judul.required' => '*wajib diisi',
            'tulisan_judul.unique' => '*judul yang anda masukkan telah ada',
            'tulisan_isi.required' => '*wajib diisi',
            'tulisan_kategori.required' => '*wajib diisi',
            'tulisan_gambar.required' => '*wajib diisi',
            'tulisan_gambar.mimes' => '*silahkan upload gambar dengan ekstensi jpg, jpeg, dan png',
            'tulisan_gambar.max' => '*silahkan upload gambar dengan ukuran dibawah 1mb',
        ]);

        $kategori = $this->kategoriM->detailData($request->tulisan_kategori);
        $gambar = $request->tulisan_gambar;
        $namaGambar = time() . '.' . $gambar->extension();
        $gambar->move(public_path('theme/images'), $namaGambar);
        $data = [
            'tulisan_judul' => $request->tulisan_judul,
            'tulisan_isi' => $request->tulisan_isi,
            'tulisan_tanggal' => new DateTime(),
            'tulisan_kategori_id' => $kategori->kategori_id,
            'tulisan_kategori_nama' => $kategori->kategori_nama,
            'tulisan_gambar' => $namaGambar,
            'tulisan_pengguna_id' => auth()->user()->id,
            'tulisan_author' => auth()->user()->name,
            'tulisan_slug' => Str::slug($request->tulisan_judul),
        ];

        $this->beritaM->insertData($data);

        return redirect()->route('list-berita')->with('store', 'berita berhasil dipost');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Update Berita',
            'kategori' => $this->kategoriM->allData(),
            'berita' => $this->beritaM->detailData($id)
        ];
        return view('admin/berita/v_edit', $data);
    }

    public function update(Request $request, $id)
    {
        $judulLama = $this->beritaM->detailData($id);
        if ($judulLama->tulisan_judul == $request->tulisan_judul) {
            $judul = ['required'];
        } else {
            $judul = ['required', 'unique:tulisan'];
        }
        $request->validate([
            'tulisan_judul' => $judul,
            'tulisan_isi' => ['required'],
            'tulisan_kategori' => ['required'],
            'tulisan_gambar' => ['mimes:jpg,jpeg,png', 'max:1024'],
        ], [
            'tulisan_judul.required' => '*wajib diisi',
            'tulisan_judul.unique' => '*judul yang anda masukkan telah ada',
            'tulisan_isi.required' => '*wajib diisi',
            'tulisan_kategori.required' => '*wajib diisi',
            'tulisan_gambar.mimes' => '*silahkan upload gambar dengan ekstensi jpg, jpeg, dan png',
            'tulisan_gambar.max' => '*silahkan upload gambar dengan ukuran dibawah 1mb',
        ]);

        $kategori = $this->kategoriM->detailData($request->tulisan_kategori);
        $gambar = $request->tulisan_gambar;
        if ($gambar !== null) {
            $namaGambar = time() . '.' . $gambar->extension();
            $gambar->move(public_path('theme/images'), $namaGambar);
            unlink(public_path('theme/images/') . $request->gambar_lama);
            $data = [
                'tulisan_judul' => $request->tulisan_judul,
                'tulisan_isi' => $request->tulisan_isi,
                'tulisan_tanggal' => new DateTime(),
                'tulisan_kategori_id' => $kategori->kategori_id,
                'tulisan_kategori_nama' => $kategori->kategori_nama,
                'tulisan_gambar' => $namaGambar,
                'tulisan_pengguna_id' => auth()->user()->id,
                'tulisan_author' => auth()->user()->name,
                'tulisan_slug' => Str::slug($request->tulisan_judul),
            ];
        } else {
            $data = [
                'tulisan_judul' => $request->tulisan_judul,
                'tulisan_isi' => $request->tulisan_isi,
                'tulisan_tanggal' => new DateTime(),
                'tulisan_kategori_id' => $kategori->kategori_id,
                'tulisan_kategori_nama' => $kategori->kategori_nama,
                'tulisan_pengguna_id' => auth()->user()->id,
                'tulisan_author' => auth()->user()->name,
                'tulisan_slug' => Str::slug($request->tulisan_judul),
            ];
        }

        $this->beritaM->updateData($id, $data);

        return redirect()->route('list-berita')->with('update', 'data berhasil diubah');
    }

    public function destroy($id)
    {
        $gambarLama = $this->beritaM->detailData($id);
        unlink(public_path('theme/images/') . $gambarLama->tulisan_gambar);
        $this->beritaM->deleteData($id);
        return redirect()->route('list-berita')->with('destroy', 'data berhasil dihapus');
    }
}