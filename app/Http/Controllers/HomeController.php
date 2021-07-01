<?php

namespace App\Http\Controllers;

use App\Models\AddressModel;
use Illuminate\Http\Request;
use App\Models\SliderModel;
use App\Models\ProfileKetuaModel;

class HomeController extends Controller
{

    public function index()
    {
        $data = [
            'slider' => SliderModel::get(),
            'address' => AddressModel::find(1),
            'ketua' => ProfileKetuaModel::find(1) 
        ];

        return view('v_home', $data);    
    }
}
