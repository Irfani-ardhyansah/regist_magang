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
        $data = Kelompok::findOrFail($request->id);

        if($kelompok->user_id != $data->user_id ) {
            return response()->json([
                'success'  => false,
                'message'   =>  'unauthorized access'
            ]);
        }
        $data->universitas = $request->universitas;
        $data->fakultas = $request->fakultas;
        $data->prodi = $request->prodi;
        $data->alamat_univ = $request->alamat_univ;
        $data->kelompok = $request->kelompok;
        $data->jumlah_anggota = $request->jumlah_anggota;
        $data->periode_mulai = $request->periode_mulai;
        $data->periode_akhir = $request->periode_akhir;
        $data->nama_ketua = $request->nama_ketua;
        $data->update();
        return response()->json([
            'success' => true,
            'message' => 'post edited'
        ]);
    }
}
