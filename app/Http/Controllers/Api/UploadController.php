<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Soal;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UploadController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:api', 'jwtAuth'], ['except' => ['login','register']]);
    }

    public function index(Request $request)
    {
        $soal = Soal::where('keterangan', 0)->get();
        return response()->json([
            'success' => true,
            'soal' => $soal
        ]);
    }

    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item' => "required|mimes:zip|max:2000"
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Upload Jawaban Tidak berhasil!'
            ]);
        }

        $post = new Soal;
        $post->user_id = Auth::user()->id;
        $post->keterangan = 1;
        // $post->item = $request->item;

        if($request->hasFile('item')){
            $file = $request->file('item');
            $nama_file = $request->name_file;
            $extension  = $file->getClientOriginalExtension();
            $fileName = $nama_file.'.'.$extension;
            $request->file('item')->move('data_jawaban/', $fileName);
            $post->item = $fileName;
        }

        $post->save();
        $post->user;
        return response()->json([
            'success' => true,
            'message' => 'Upload Jawaban berhasil!',
            'post' => $post
        ]);
    }
}
