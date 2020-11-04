<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelompok;
use App\Data_kelompok;
use App\User;
use App\Soal;
use File;
use Mail;

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
        if($jawaban) {
            File::delete('data_jawaban/'.$jawaban->item);
            $jawaban->delete();

            $data = Kelompok::findOrFail($id);
            $data -> delete();
        } else {
            $data = Kelompok::findOrFail($id);
            $data -> delete();
        }
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
            //Menangkap Request Dari USer
            $data = $request->all();
            //Mencari Data Terkait
            $data_kelompok = Data_kelompok::where(['id'=>$id])->first();
            //Mencari Email dari Data terkait
            $email = $data_kelompok->email_anggota;
            //Mengupdate data
            $data_kelompok->update(['status'=>$data['status']]);

            // Data_kelompok::where(['id'=>$id])->update(['status'=>$data['status']]);

            //Mengirim Notifikasi Pada Email Anggota Kelompok
            if($data['status'] == 1) {
                Mail::send('mails.diterima', ['email' => $email], function($m) use($email){
                    $m->subject('Pemberitahuan Dari PT. Kreasi Kode Indonesia');
                    $m->from('no-reply@kreasikode.com', 'PT. Kreasi Kode Indonesia');
                    $m->to($email);
                });
                return redirect()->back()->with('success', 'Berhasil Mengubah Status Diterima');
            } else if ($data['status'] == 2) {
                Mail::send('mails.ditolak', ['email' => $email], function($m) use($email){
                    $m->subject('Pemberitahuan Dari PT. Kreasi Kode Indonesia');
                    $m->from('no-reply@kreasikode.com', 'PT. Kreasi Kode Indonesia');
                    $m->to($email);
                });
                return redirect()->back()->with('success', 'Berhasil Mengubah Status Ditolak');
            } else if ($data['status'] == 3) {
                Mail::send('mails.selesai', ['email' => $email], function($m) use($email){
                    $m->subject('Pemberitahuan Dari PT. Kreasi Kode Indonesia');
                    $m->from('no-reply@kreasikode.com', 'PT. Kreasi Kode Indonesia');
                    $m->to($email);
                });
                return redirect()->back()->with('success', 'Berhasil Mengubah Status Selesai');
            } else {
                return redirect()->back()->with('success', 'Berhasil Mengubah Status Menunggu');
            }
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
