<?php

namespace App\Http\Controllers;
use App\Models\AddressModel;

class AboutPageController extends Controller
{
    public function index()
    {
        $data = [
            'address' => AddressModel::find(1),
        ];
        return view('v_about', $data);
    }
}
