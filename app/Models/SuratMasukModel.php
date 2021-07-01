<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SuratMasukModel extends Model
{
    protected $table = 'sm';

    public function allData()
    {
        return DB::table('sm')
        ->leftJoin('arsipsm', 'arsipsm.id_arsip', '=', 'sm.id_arsip')
        ->leftJoin('lampiran_sm', 'lampiran_sm.file', '=', 'sm.file')
        ->get();
    }

    public function detailData($id)
    {
        return DB::table('sm')->where('id', $id)->first();
    }

    public function inserData($data)
    {
        return DB::table('sm')
        ->leftJoin('lampiran_sm', 'lampiran_sm.file', '=', 'sm.file')
        ->insert($data);
    }

    public function updateData($id, $data)
    {
        return DB::table('sm')->where('id', $id)->update($data);
    }

    public function deleteData($id)
    {
        return DB::table('sm')->where('id', $id)->delete();
    }

    public function kodeArsipSm()
    {
        return DB::table('arsipsm')->get();
    }

    public function findReport($fromDate, $toDate)
    {
        return DB::table('sm')
        ->leftJoin('arsipsm', 'arsipsm.id_arsip', '=', 'sm.id_arsip')
        ->leftJoin('lampiran_sm', 'lampiran_sm.file', '=', 'sm.file')
        ->whereBetween('tgl_st', [$fromDate, $toDate])
        ->get();
    }

    public function amount()
    {
        return DB::table('sm')->count();
    }
}
