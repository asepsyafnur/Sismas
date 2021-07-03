<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AgendaModel;
use DateTime;

class AgendaController extends Controller
{
    protected $agendaM;
    public function __construct()
    {
        $this->agendaM = new AgendaModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Agenda',
            'agenda' => $this->agendaM->allData()
        ];
        return view('admin/berita/v_agenda', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'agenda_nama' => ['required'],
            'agenda_deskripsi' => ['required'],
            'agenda_mulai' => ['required'],
            'agenda_selesai' => ['required'],
            'agenda_tempat' => ['required'],
            'agenda_waktu' => ['required'],
            'agenda_keterangan' => ['required'],
        ], [
            'agenda_nama.required' => '*wajib diisi',
            'agenda_deskripsi.required' => '*wajib diisi',
            'agenda_mulai.required' => '*wajib diisi',
            'agenda_selesai.required' => '*wajib diisi',
            'agenda_tempat.required' => '*wajib diisi',
            'agenda_waktu.required' => '*wajib diisi',
            'agenda_keterangan.required' => '*wajib diisi',
        ]);

        $data = [
            'agenda_nama' => $request->agenda_nama,
            'agenda_deskripsi' => $request->agenda_deskripsi,
            'agenda_tanggal' => new DateTime(),
            'agenda_mulai' => $request->agenda_mulai,
            'agenda_selesai' => $request->agenda_selesai,
            'agenda_tempat' => $request->agenda_tempat,
            'agenda_waktu' => $request->agenda_waktu,
            'agenda_keterangan' => $request->agenda_keterangan,
            'agenda_author' => auth()->user()->name,
        ];
        
        $this->agendaM->insertData($data);
        return redirect()->route('agenda')->with('store', 'berhasil menambah agenda');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'agenda_nama' => ['required'],
            'agenda_deskripsi' => ['required'],
            'agenda_mulai' => ['required'],
            'agenda_selesai' => ['required'],
            'agenda_tempat' => ['required'],
            'agenda_waktu' => ['required'],
            'agenda_keterangan' => ['required'],
        ], [
            'agenda_nama.required' => '*wajib diisi',
            'agenda_deskripsi.required' => '*wajib diisi',
            'agenda_mulai.required' => '*wajib diisi',
            'agenda_selesai.required' => '*wajib diisi',
            'agenda_tempat.required' => '*wajib diisi',
            'agenda_waktu.required' => '*wajib diisi',
            'agenda_keterangan.required' => '*wajib diisi',
        ]);

       $data = [
            'agenda_nama' => $request->agenda_nama,
            'agenda_deskripsi' => $request->agenda_deskripsi,
            'agenda_tanggal' => new DateTime(),
            'agenda_mulai' => $request->agenda_mulai,
            'agenda_selesai' => $request->agenda_selesai,
            'agenda_tempat' => $request->agenda_tempat,
            'agenda_waktu' => $request->agenda_waktu,
            'agenda_keterangan' => $request->agenda_keterangan,
            'agenda_author' => auth()->user()->name,
        ];

        $this->agendaM->updateData($id, $data);
        return redirect()->route('agenda')->with('update', 'berhasil mengubah agenda');
    }

    public function destroy($id)
    {
        $this->agendaM->deleteData($id);
        return redirect()->route('agenda')->with('destroy', 'berhasil menghapus agenda');

    }
}
