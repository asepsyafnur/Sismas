<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfileModel;

class ProfileController extends Controller
{
    protected $ProfileM;

    public function __construct()
    {
        $this->ProfileM = new ProfileModel();
    }

    public function edit($id)
    {
        $data = [
            'user' => $this->ProfileM->detailData($id)
        ];
        return view('admin.pengaturan.v_edit_profile', $data);
    }

    public function update(Request $request, $id)
    {
        $user = $this->ProfileM->detailData($id);
        $email = $request->email;
        if ($user->email == $email) {
            $ruleEmail = 'required';
        } else {
            $ruleEmail = 'required|unique:users';
        }
        $request->validate([
            'name' => 'required',
            'email' => $ruleEmail,
            'image' => 'file|mimes:jpg,png,jpeg|size:1024'
        ], [
            'name.required' => 'nama tidak boleh kosong',
            'email.required' => 'email tidak boleh kosong',
            'email.unique' => 'email sudah terdaftar',
            'image.mimes' => 'gambar harus berekstensi jpg,jpeg,png',
            'image.size' => 'resize gambar menjadi 250x250'
        ]);

        $userImage = $request->image;
        if ($userImage !== null) {
            $namaGambar = time() . '.' . $userImage->extension();
            $userImage->move(public_path('img_users', $namaGambar));
            if ($user->image !== 'default.png') {
                unlink(public_path('img_users/' . $user->image));
            }
            $data = [
                'name' => $request->name,
                'email' => $email,
                'image' => $namaGambar
            ];

            $this->ProfileM->updateData($id, $data);
        } else {

            $data = [
                'name' => $request->name,
                'email' => $email,
            ];

            $this->ProfileM->updateData($id, $data);
        }

        return redirect()->to('profile/' . $id);
    }
}
