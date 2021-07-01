<?php

namespace App\Http\Controllers;

use App\Models\AddressModel;
use Illuminate\Http\Request;
use App\Models\SliderModel;
use App\Models\AboutModel;
use App\Models\TulisanModel;

class HomeController extends Controller
{

    public function index()
    {
        $berita = new TulisanModel();
        $data = [
            'slider' => SliderModel::get(),
            'address' => AddressModel::find(1),
            'about' => AboutModel::find(1),
            'berita' => $berita->getData()
        ];

        return view('v_home', $data);    
    }
}
