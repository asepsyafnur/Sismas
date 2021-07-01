<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AddressModel extends Model
{
    protected $table = 'address';
    
    protected $fillable = [
        'telp',
        'email',
        'alamat'
    ];

    public function updateData($id, $data)
    {
        return DB::table('address')->where('id', $id)->update($data);
    }

}
