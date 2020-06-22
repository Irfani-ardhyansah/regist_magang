<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Soal;
use App\Kelompok;
use App\Data_kelompok;

class UserController extends Controller
{
    public function index()
    {
        return view('user.home');
    }

    public function soal()
    {
        $soal = Soal::all();
        return view('user.download', compact('soal'));
    }

    public function home()
    {
        $data = Kelompok::where('user_id', auth()->user()->id)->get();
        //memecah array
        foreach($data as $row)
        //mengambil id pada Kelompok
        $data_id = $row->id;
        $data_kelompok = Data_kelompok::where('kelompok_id', $data_id)->get();
        return view('user.data', compact('data', 'data_kelompok'));
    }

    public function data_kelompok_update(Request $request, $id)
    {
        if($request->isMethod('post')) {
            $data = $request->all();
            Data_kelompok::where(['id'=>$id])->update(['nama'=>$data['nama'], 'nim'=>$data['nim'], 'jenis_kelamin'=>$data['jenis_kelamin'], 'email_anggota'=>$data['email_anggota'], 'alamat'=>$data['alamat'], 'keahlian'=>$data['keahlian']]);
            return redirect()->back()->with('success', 'Update Berhasil');
        }
    }

    public function kelompok_update(Request $request, $id)
    {
        if($request->isMethod('post')) {
            $data = $request->all();
            Kelompok::where(['id'=>$id])->update(['universitas'=>$data['universitas'], 'fakultas'=>$data['fakultas'], 'prodi'=>$data['prodi'], 'alamat_univ'=>$data['alamat_univ'], 'jumlah_anggota'=>$data['jumlah_anggota'], 'kelompok'=>$data['kelompok'], 'periode_mulai'=>$data['periode_mulai'], 'periode_akhir'=>$data['periode_akhir'], 'nama_ketua'=>$data['nama_ketua']]);
            return redirect()->back()->with('success', 'Update Berhasil');
        }
    }

    public function delete($id)
    {        
        $data = Data_kelompok::findOrFail($id);
        $data -> delete();
        return back()->with(['success' => 'Berhasil Dihapus']);
    }

    public function detail($id)
    {
        $data = Data_kelompok::findOrFail($id);
        return view('user.detail', compact('data'));
    }
}
