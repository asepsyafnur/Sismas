<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AgendaModel extends Model
{
    protected $primaryKey = 'agenda_id';

    public function allData()
    {
        return DB::table('agenda')->get();
    }

    public function detailData($id)
    {
        return DB::table('agenda')->where('agenda_id', $id)->first();
    }

    public function insertData($data)
    {
        return DB::table('agenda')->insert($data);
    }

    public function updateData($id, $data)
    {
        return DB::table('agenda')->where('agenda_id', $id)->update($data);
    }

    public function deleteData($id)
    {
        return DB::table('agenda')->where('agenda_id', $id)->delete();
    }
}
