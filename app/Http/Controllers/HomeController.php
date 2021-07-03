<?php

namespace App\Http\Controllers;

use App\Models\AddressModel;
use App\Models\SliderModel;
use App\Models\AboutModel;
use App\Models\BeritaModel;
use App\Models\AgendaModel;

class HomeController extends Controller
{

    public function index()
    {
        $berita = new BeritaModel();
        $agenda = new AgendaModel();
        $data = [
            'slider' => SliderModel::get(),
            'address' => AddressModel::find(1),
            'about' => AboutModel::find(1),
            'berita' => $berita->allData(),
            'agenda' => $agenda->allData()
        ];

        return view('v_home', $data);    
    }
}
