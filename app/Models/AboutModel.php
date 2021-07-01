<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AboutModel extends Model
{
    protected $table = 'profile_ketua';
    protected $fillable = [
        'nama',
        'sambutan_home',
        'sambutan',
        'foto',
    ];

    public function detailData($id)
    {
        return DB::table('profile_ketua')->where('id', $id)->first();
    }

    public function updateData($id, $data)
    {
        return DB::table('profile_ketua')->where('id', $id)->update($data);
    }
}
