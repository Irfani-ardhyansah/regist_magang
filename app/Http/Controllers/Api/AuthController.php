<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Kelompok;
use App\Data_kelompok;

class AuthController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function login(Request $request)
    {
        $creds = $request->only(['email', 'password']);

        if(! $token= JWTAuth::attempt($creds)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credintials'
            ], 500);
        }

        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => Auth::user(),
            'kelompok' => $kelompok = Kelompok::where('user_id', Auth::user()->id)->first(),
            'data_anggota' => Data_kelompok::where('kelompok_id', $kelompok->id)->get()
        ], 200);
    }

    public function register(Request $request)
    {
        
        try{
            $user = User::create([
                'email' => $request['email'],
                'password' => Hash::make($request['password'])
            ]);

            if(!empty($request['nama_ketua'])) {
                $data2 = array(
                    'user_id' => $user->id,
                    'universitas' => $request['universitas'],
                    'fakultas' => $request['fakultas'],
                    'prodi' => $request['prodi'],
                    'alamat_univ' => $request['alamat_univ'],
                    'kelompok' => $request['kelompok'],
                    'jumlah_anggota' => $request['jumlah_anggota'],
                    'periode_mulai' => $request['periode_mulai'],
                    'periode_akhir' => $request['periode_akhir'],
                    'nama_ketua' => $request['nama_ketua']
                );
                $kelompok = Kelompok::create($data2);
            }

            return response()->json([
                'success' => true,
                'user' => $user,
                'kelompok' => $kelompok
            ], 200);
        } catch(Exception $e){  
            return response()->json([
                'success' => false,
                'message'  => ''.$e
            ], 500);
        }
    }

    public function RegisterAnggota(Request $request)
    {
        $data = Kelompok::where('user_id', auth()->user()->id)->get();
        //memecah array
        foreach($data as $row)
        //mengambil id pada Kelompok
        $kelompok_id = $row->id;
        try{
            // $bidang = implode(",", $request['bidang_minat']);
            $data_anggota = array(
                'kelompok_id' => $kelompok_id,
                'nama' => $request['nama'],
                'nim' => $request['nim'],
                'jenis_kelamin' => $request['jenis_kelamin'],
                'no_hp' => $request['no_hp'],
                'status' => 0,
                'sosmed' => $request['sosmed'],
                'email_anggota' => $request['email_anggota'],
                'alamat' => $request['alamat'],
                // 'bidang_minat' => $bidang,
                'keahlian' => $request['keahlian'],
            );
            $data = Data_kelompok::create($data_anggota);

            return response()->json([
                'success' => true,
                'data' => $data
            ], 200);
        } catch(Exception $e){
            return response()->json([
                'success' => false,
                'message'  => ''.$e
            ], 403);
        }
    }

    public function logout(Request $request)
    {
        try{
            JWTAuth::invalidate(JWTAuth::parseToken($request->token));
            return response()->json([
                'success'   =>  true,
                'message'   =>  'Logout Berhasil'
            ], 200);
        } catch(Exception $e){
            return response()->json([
                'success'   =>  false,
                'message'   =>  ''.$e
            ], 500);
        }
        
    }
}
