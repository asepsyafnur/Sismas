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
        $row = $this->aboutM->detailData($id);
        // dd($foto);
        $request->validate([
            'nama' => 'required',
            'sambutan' => 'required',
            'sambutan_home' => 'required',
            'foto' => 'mimes:jpg,png,jpeg|max:1024'
        ], [
            'nama.required' => '*wajib diisi',
            'sambutan.required' => '*wajib diisi',
            'sambutan_home.required' => '*wajib diisi',
            'foto.mimes' => '*gambar harus berekstensi jpg,jpeg,png',
            'foto.max' => '*silahkan upload foto dibawah ukuran 1mb'
        ]);
        
        $foto = $request->foto;
        if ($foto !== null) 
        {
            $namaFoto = time() . '.' . $foto->extension();
            $foto->move(public_path('theme/images'), $namaFoto);
            unlink(public_path('theme/images/') . $row->foto);
            $data = [
                'nama' => $request->nama,
                'sambutan_home' => $request->sambutan_home,
                'sambutan' => $request->sambutan,
                'foto' => $namaFoto
            ];
        }else
        {
            $data = [
                'nama' => $request->nama,
                'sambutan_home' => $request->deskripsi,
                'sambutan' => $request->sambutan,
            ];
        }

        $this->aboutM->updateData($id, $data);
        return redirect()->route('about')->with('update', 'data berhasil diubah');
    }
}
