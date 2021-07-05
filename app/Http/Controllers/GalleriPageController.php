<?php

namespace App\Http\Controllers;

use App\Models\GalleriModel;
use App\Models\AddressModel;

class GalleriPageController extends Controller
{
    public function index()
    {
        $data = [
            'address' => AddressModel::find(1)
        ];
        return view('v_galleri', $data);
    }
}
