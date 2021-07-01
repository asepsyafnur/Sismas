<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TulisanModel extends Model
{   
    public function getData()
    {
        return DB::table('tulisan')->leftJoin('users', 'users.id', '=', 'tulisan.tulisan_pengguna_id')
            ->leftJoin('kategori', 'kategori.kategori_id', '=', 'tulisan.tulisan_kategori_id')
            ->get();
    }
}
