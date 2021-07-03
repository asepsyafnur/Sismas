<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BeritaModel extends Model
{
    protected $primaryKey = 'tulisan_id';

    public function allData()
    {
        return DB::table('tulisan')
        ->leftJoin('kategori', 'kategori.kategori_id', '=', 'tulisan.tulisan_kategori_id')
        ->leftJoin('users', 'users.id', '=', 'tulisan.tulisan_pengguna_id')
        ->get();
    }

    public function detailData($id)
    {
        return DB::table('tulisan')->where('tulisan_id', $id)->first();
    }

    public function insertData($data)
    {
        return DB::table('tulisan')->insert($data);
    }

    public function updateData($id, $data)
    {
        return DB::table('tulisan')->where('tulisan_id', $id)->update($data);
    }

    public function deleteData($id)
    {
        return DB::table('tulisan')->where('tulisan_id', $id)->delete();
    }
}
