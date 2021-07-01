<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddressModel;

class AddressController extends Controller
{
    protected $addressM;

    public function __construct()
    {
        $this->addressM = new AddressModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Header',
            'address' => $this->addressM->find(1),
        ];
        return view('admin/pengaturan/v_header', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'telp' => 'required',
            'email' => 'required',
            'alamat' => 'required'
        ], [
            'telp.required' => '*wajib diisi',
            'email.required' => '*wajib diisi',
            'alamat.required' => '*wajib diisi',
        ]);

        $data = [
            'telp' => $request->telp,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ];

        $this->addressM->updateData($id, $data);
        return redirect()->route('address')->with('update', 'data berhasil diubah');
    }
}
