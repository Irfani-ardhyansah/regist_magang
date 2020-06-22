<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelompok;
use App\Data_kelompok;
use App\User;

class DataController extends Controller
{
    public function index()
    {
        $data = Kelompok::all();
        return view('admin.dashboard', compact('data'));
    }

    public function detail($id)
    {
        $row = Kelompok::findOrFail($id);
        $data_kelompok = Data_kelompok::where('kelompok_id', $id)->get();
        return view('admin.detail', compact('row', 'data_kelompok'));
    }

    public function change_status(Request $request, $id)
    {
        if($request->isMethod('post')) {
            $data = $request->all();
            Data_kelompok::where(['id'=>$id])->update(['status'=>$data['status']]);
            return redirect()->back()->with('success', 'Update Berhasil');
        }
    }

    public function detail_anggota($id)
    {
        $row = Data_kelompok::findOrFail($id);
        return view('admin.detail_anggota', compact('row'));
    }

    public function delete($id)
    {        
        $data = Data_kelompok::findOrFail($id);
        $data -> delete();
        return back()->with(['success' => 'Berhasil Dihapus']);
    }
}
