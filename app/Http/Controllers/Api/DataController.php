<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Kelompok;
use App\Data_kelompok;

class DataController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:api', 'jwtAuth']);
    }

    public function kelompok()
    {
        $data = Kelompok::where('user_id', Auth::user()->id)->get();
        if(!empty($data)) {
            return response()->json([
                'success' => true,
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'data' => []
            ], 500);
        }
    }

    public function data_anggota()
    {
        $data = Kelompok::where('user_id', Auth::user()->id)->get();
        foreach($data as $row)
        //mengambil id pada Kelompok
        $data_id = $row->id;
        $data_kelompok = Data_kelompok::where('kelompok_id', $data_id)->get();
        if(!empty($data)) {
            return response()->json([
                'success'   =>  true,
                'data' => $data_kelompok
            ], 200);
        } else {
            return response()->json([
                'success'   =>  false,
                'data' => []
            ], 500);
        }
    }

    public function update_kelompok(Request $request)
    {
        $kelompok = Kelompok::where('user_id', Auth::user()->id)->first();
        // $data = Data_kelompok::findOrFail($request->id)->first();

        if($kelompok->user_id != Auth::user()->id) {
            return response()->json([
                'success'   =>  false,
                'message'   =>  'unauthorized access'
            ]);
        }

        try {
            $kelompok->universitas = $request->universitas;
            $kelompok->fakultas = $request->fakultas;
            $kelompok->prodi = $request->prodi;
            $kelompok->alamat_univ = $request->alamat_univ;
            $kelompok->jumlah_anggota = $request->jumlah_anggota;
            $kelompok->kelompok = $request->kelompok;
            $kelompok->periode_mulai = $request->periode_mulai;
            $kelompok->periode_akhir = $request->periode_akhir;
            $kelompok->nama_ketua = $request->nama_ketua;
            $kelompok->update();

            return response()->json([
                'success' => true,
                'data' => $kelompok,
                'message' => 'Kelompok Edited'
            ], 200);
        } catch(\Exception $e) {

            return response()->json([
                'success'   =>  false,
                'message'   =>  'Somethin Wrong'
            ], 500);
        }

    }

    public function delete(Request $request)
    {
        $kelompok = Kelompok::where('user_id', Auth::user()->id)->first();
        $data = Kelompok::findOrFail($request->id);

        if($kelompok->user_id != $data->user_id ) {
            return response()->json([
                'success'  => false,
                'message'   =>  'unauthorized access'
            ]);
        }

        try {
            $data->delete();
            return response()->json([
                'success'   =>  true,
                'message'   =>  'Kelompok Deleted'
            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                'success'   =>  false,
                'message'   =>  'Something Wrong'
            ], 500);
        }
    }

    public function update_anggota_kelompok(Request $request)
    {
        $kelompok = Kelompok::where('user_id', Auth::user()->id)->first();
        $data = Data_kelompok::findOrFail($request->id);

        if($kelompok->id != $data->kelompok_id) {
            return response()->json([
                'success'   =>  false,
                'message'   =>  'unauthorized access'
            ]);
        }

        try{
            $data->nama = $request->nama;
            $data->nim = $request->nim;
            $data->no_hp = $request->no_hp;
            $data->sosmed = $request->sosmed;
            $data->jenis_kelamin = $request->jenis_kelamin;
            $data->email_anggota = $request->email_anggota;
            $data->alamat = $request->alamat;
            $data->bidang_minat = $request->bidang_minat;
            $data->keahlian = $request->keahlian;
            $data->update();

            return response()->json([
                'success'   =>  true,
                'message'   =>  'Data Anggota Edited'
            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                'success'   => true,
                'message'   =>  'Something wrong'
            ], 500); 
        }
    }   
}
