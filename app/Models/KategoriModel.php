<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KategoriModel extends Model
{
    protected $primaryKey = 'kategori_id';

    protected $fillable = [
        'kategori_nama',
        'kategori_tanggal'
    ];

    public function allData()
    {
        return DB::table('kategori')->get();
    }

    public function detailData($id)
    {
        return DB::table('kategori')->where('kategori_id', $id)->first();
    }

    public function insertData($data)
    {
        return DB::table('kategori')->insert($data);
    }

    public function updateData($id, $data)
    {
        return DB::table('kategori')->where('kategori_id', $id)->update($data);
    }

    public function deleteData($id)
    {
        return DB::table('kategori')->where('kategori_id', $id)->delete();
    }
    
}
