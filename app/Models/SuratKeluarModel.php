<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SuratKeluarModel extends Model
{
    protected $table = 'sk';
    public function allData()
    {
        return DB::table('sk')
        ->leftJoin('arsipsk', 'arsipsk.id_arsip', '=', 'sk.id_arsip')
        ->leftJoin('lampiran_sk', 'lampiran_sk.file', '=', 'sk.file')
        ->get();
    }

    public function detailData($id)
    {
        return DB::table('sk')->where('id', $id)->first();
    }

    public function inserData($data)
    {
        return DB::table('sk')->insert($data);
    }

    public function updateData($id, $data)
    {
        return DB::table('sk')->where('id', $id)->update($data);
    }

    public function deleteData($id)
    {
        return DB::table('sk')->where('id', $id)->delete();
    }

    public function kodeArsipsk()
    {
        return DB::table('arsipsk')->get();
    }

    public function findReport($fromDate, $toDate)
    {
        return DB::table('sk')
        ->leftJoin('arsipsk', 'arsipsk.id_arsip', '=', 'sk.id_arsip')
        ->leftJoin('lampiran_sk', 'lampiran_sk.file', '=', 'sk.file')
        ->whereBetween('tgl_st', [$fromDate, $toDate])
        ->get();
    }
    
    public function amount()
    {
        return DB::table('sk')->count();
    }
}
