<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Soal;
use App\Kelompok;
use App\Data_kelompok;
use Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function soal()
    {
        $soal = Soal::where('keterangan', 'soal')->get();
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
        return view('user.home', compact('data', 'data_kelompok', 'hasil_bidang'));
    }

    public function data_kelompok_update(Request $request, $id)
    {
        if($request->isMethod('post')) {
            $data = $request->all();
            if(!empty($data['bidang_minat'])) {
                $bidang = implode(",", $data['bidang_minat']);
            } else {
                $bidang = NULL;
            }
            Data_kelompok::where(['id'=>$id])->update(['nama'=>$data['nama'], 'nim'=>$data['nim'], 'jenis_kelamin'=>$data['jenis_kelamin'], 'email_anggota'=>$data['email_anggota'], 'alamat'=>$data['alamat'], 'bidang_minat'=>$bidang, 'keahlian'=>$data['keahlian']]);
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

    public function upload()
    {
        return view('user.upload');
    }

    public function upload_file(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item' => "required|mimes:zip,rar|max:2000"
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['error' => 'File Jawaban Terlalu Besar / Ekstensi Tidak Sesuai!']);
        } 

        try {
            if($request->hasFile('item')){
                $file = $request->file('item');
                $nama_file = $request->name_file;
                $extension  = $file->getClientOriginalExtension();
                $fileName = $nama_file.'.'.$extension;
                $request->file('item')->move('data_jawaban/', $fileName);
                $item = $fileName;
            }

            if(!empty($item)){
                $data = Soal::create([
                    'user_id' => Auth::user()->id,
                    'keterangan' => 1,
                    'item' => $item,
                ]);
            } else {
                return redirect()->back()->with(['error' => 'File Jawaban Terlalu Besar.']);
            }

            return redirect()->back()->with(['success' => 'Jawaban Berhasil DiUpload']);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
