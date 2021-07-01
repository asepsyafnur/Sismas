<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProfileModel extends Model
{

    public function detailData($id)
    {
        return DB::table('users')->where('id', $id)->first();
    }

    public function updateData($id, $data)
    {
        return DB::table('users')->where('id', $id)->update($data);
    }


}
