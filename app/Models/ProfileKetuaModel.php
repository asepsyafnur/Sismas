<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ProfileKetuaModel extends Model
{
    protected $table = 'profile_ketua';
    protected $fillable = [
        'nama',
        'sambutan_home',
        'sambutan'
    ];
}
