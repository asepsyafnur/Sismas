<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderModel extends Model
{
    protected $table = 'slider';
    protected $fillable = [
        'gambar',
        'title',
        'sub_title'
    ];
}
