<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuratMasukModel;
use App\Models\SuratKeluarModel;

class DashboardController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'suratM' => SuratMasukModel::count(),
            'suratK' => SuratKeluarModel::count(),
        ];
        return view('admin/v_index', $data);
    }
}
