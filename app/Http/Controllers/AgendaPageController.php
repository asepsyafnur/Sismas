<?php

namespace App\Http\Controllers;

use App\Models\AgendaModel;
use App\Models\AddressModel;

class AgendaPageController extends Controller
{
    public function index()
    {
        $agenda = new AgendaModel();
        $data = [
            'address' => AddressModel::find(1),
            'agenda' => $agenda->allData()
        ];
        return view('v_agenda', $data);
    }
}
