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
        $soal = Soal::all();
        return view('admin.upload', compact('soal'));
    }

    public function upload_file()
    {
        return view('admin.upload_file');
    }

    public function send(Request $request)
    {
        $this->validate($request, [
            'soal' => "required|mimes:pdf|max:10000"
        ]);

        try {
            $data = Soal::create([
                'user_id' => Auth::user()->id,
            ]);

            if($request->hasFile('soal')){
                $file = $request->file('soal');
                $nama_file = $request->name_file;
                $extension  = $file->getClientOriginalExtension();
                $fileName = $nama_file.'.'.$extension;
                $request->file('soal')->move('data_soal/', $fileName);
                $data->soal = $fileName;
                $data->save();
            }

            return redirect('data_upload')->with(['success' => 'Soal Berhasil DiUpload']);
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
