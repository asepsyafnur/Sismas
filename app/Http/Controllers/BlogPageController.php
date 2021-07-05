<?php

namespace App\Http\Controllers;

use App\Models\AddressModel;
use App\Models\BeritaModel;
use App\Models\KategoriModel;

class BlogPageController extends Controller
{
    protected $berita,$kategori;
    public function __construct()
    {
        $this->berita = new BeritaModel();
        $this->kategori = new KategoriModel();
    }
    public function index()
    {
        
        $data = [
            'address' => AddressModel::find(1),
            'berita' => $this->berita->allData(),
            'kategori' => $this->kategori->allData()
        ];
        return view('v_blog', $data);
    }

    public function artikel($slug)
    {
        $data = [
            'address' => AddressModel::find(1),
            'detail' => $this->berita->detailArtikel($slug),
            'kategori' => $this->kategori->allData()
        ];
        return view('v_detail_blog', $data);
    }
}
