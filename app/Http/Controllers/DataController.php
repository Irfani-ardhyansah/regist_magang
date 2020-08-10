<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelompok;
use App\Data_kelompok;
use App\User;
use App\Soal;
use File;

class DataController extends Controller
{
    public function index()
    {
        $data = Kelompok::paginate(10);
        return view('admin.dashboard', compact('data'));
    }

    public function delete_kelompok($id)
    {
        //Mendapatkan User id
        $user_id = Kelompok::where('id', $id)->first()->user_id;
        //mencari jawaban yang diupload user
        $jawaban = Soal::where('user_id',$user_id)->first();
        //Menghapus file jawaban pada server
        File::delete('data_jawaban/'.$jawaban->item);
        $jawaban->delete();

        $data = Kelompok::findOrFail($id);
        $data -> delete();
        return back()->with(['success' => 'Berhasil Dihapus']);
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
            return redirect()->back()->with('success', 'Berhasil Mengubah Status');
        }
    }

    public function detail_anggota($id)
    {
        $row = Data_kelompok::findOrFail($id);
        $bidang_minat = explode(",", $row->bidang_minat);
        // dd($bidang_minat);
        return view('admin.detail_anggota', compact('row', 'bidang_minat'));
    }

    public function delete($id)
    {      
        $data = Data_kelompok::findOrFail($id);
        $data -> delete();
        return back()->with(['success' => 'Berhasil Dihapus']);
    }
    
}
