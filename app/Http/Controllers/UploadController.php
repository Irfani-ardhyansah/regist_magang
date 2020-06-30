<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Soal;
use Auth;
use File;

class UploadController extends Controller
{
    public function upload()
    {
        $soal = Soal::where('keterangan', 0)->get();
        return view('admin.upload', compact('soal'));
    }

    public function upload_file()
    {
        return view('admin.upload_file');
    }

    public function send(Request $request)
    {
        $this->validate($request, [
            'item' => "required|mimes:pdf|max:10000"
        ]);

        try {
            $data = Soal::create([
                'user_id' => Auth::user()->id,
                'keterangan' => 0,
            ]);

            if($request->hasFile('item')){
                $file = $request->file('item');
                $nama_file = $request->name_file;
                $extension  = $file->getClientOriginalExtension();
                $fileName = $nama_file.'.'.$extension;
                $request->file('item')->move('data_soal/', $fileName);
                $data->item = $fileName;
                $data->save();
            }

            return back()->with(['success' => 'Soal Berhasil DiUpload']);
        } catch(\Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        $gambar = Soal::where('id',$id)->first();
        File::delete('data_soal/'.$gambar->soal);
        
        $soal = Soal::findOrFail($id);
        $soal -> delete();
        return back()->with(['success' => 'Berhasil Dihapus']);
    }
}
