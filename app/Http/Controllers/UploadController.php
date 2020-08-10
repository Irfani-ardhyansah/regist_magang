<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Soal;
use Auth;
use File;
use Illuminate\Support\Facades\Validator;

class UploadController extends Controller
{
    public function upload()
    {
        $soal = Soal::where('keterangan', 0)->get();
        return view('admin.data_upload', compact('soal'));
    }

    public function upload_file()
    {
        return view('admin.upload_file');
    }

    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item' => "required|mimes:pdf|max:2000"
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['error' => 'File Soal Terlalu Besar / Ekstensi Tidak Sesuai!']);
        }

        try {
            if($request->hasFile('item')){
                $file = $request->file('item');
                $nama_file = $request->name_file;
                $extension  = $file->getClientOriginalExtension();
                $fileName = $nama_file.'.'.$extension;
                $request->file('item')->move('data_soal/', $fileName);
                $item = $fileName;
            }

            if(!empty($item)){
                $data = Soal::create([
                    'user_id' => Auth::user()->id,
                    'keterangan' => 0,
                    'item' => $item,
                ]);
            } else {
                return redirect()->back()->with(['error' => 'File Jawaban Terlalu Besar.']);
            }

            return redirect()->route('data_upload')->with(['success' => 'Soal Berhasil DiUpload']);
        } catch(\Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        $gambar = Soal::where('id',$id)->first();
        File::delete('data_soal/'.$gambar->item);
        
        $soal = Soal::findOrFail($id);
        $soal -> delete();
        return back()->with(['success' => 'File Soal Berhasil Dihapus']);
    }
}
