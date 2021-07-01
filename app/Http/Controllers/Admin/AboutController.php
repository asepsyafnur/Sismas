<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutModel;

class AboutController extends Controller
{
    protected $aboutM;

    public function __construct()
    {
        $this->aboutM = new AboutModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'About',
            'about' => $this->aboutM->detailData(1),
        ];
        return view('admin/pengaturan/v_about', $data);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'nama' => $request->nama,
            'sambutan_home' => $request->deskripsi,
            'sambutan' => $request->sambutan,
        ];

        $this->aboutM->updateData($id, $data);
        return redirect()->route('about')->with('update', 'data berhasil diubah');
    }
}
