<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddressModel extends Model
{
    protected $table = 'address';
    
    protected $fillable = [
        'telp',
        'email',
        'alamat'
    ];
}
