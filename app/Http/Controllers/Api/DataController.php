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
            ]);
        } else {
            return response()->json([
                'success' => false,
                'data' => []
            ]);
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
            ]);
        } else {
            return response()->json([
                'success'   =>  false,
                'data' => []
            ]);
        }
    }
}
