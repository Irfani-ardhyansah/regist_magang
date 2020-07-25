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
            ]);
        }

        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => Auth::user(),
            'kelompok' => 'Kelompok Berhasil ditambah',
            // 'data_anggota' => 'Data Anggota Berhasil Ditambah'
        ]);
    }

    public function register(Request $request)
    {
        // $encryptedPass = Hash::make($request->password);

        // $user = new User;
        $kelompok = new Kelompok;
        $data_kelompok = new Data_kelompok;

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

            // if(!empty($request['nama'])) {
            //     foreach ($request['nama'] as $item => $value) {
            //         $bidang = implode(",", $request['bidang_minat'][$item]);
            //         $data3 = array(
            //             'kelompok_id' => $kelompok->id,
            //             'nama' => $request['nama'][$item],
            //             'nim' => $request['nim'][$item],
            //             'jenis_kelamin' => $request['jenis_kelamin'][$item],
            //             'no_hp' => $request['no_hp'][$item],
            //             'status' => 0,
            //             'sosmed' => $request['sosmed'][$item],
            //             'email_anggota' => $request['email_anggota'][$item],
            //             'alamat' => $request['alamat'][$item],
            //             'bidang_minat' => $bidang,
            //             'keahlian' => $request['keahlian'][$item],
            //         );
            //         Data_kelompok::create($data3);
            //     }
            // }
            // $user->save();
            return $this->login($request);
        } catch(Exception $e){  
            return response()->json([
                'success' => false,
                'message'  => ''.$e
            ]);
        }
    }

    public function logout(Request $request)
    {
        try{
            JWTAuth::invalidate(JWTAuth::parseToken($request->token));
            return response()->json([
                'success'   =>  true,
                'message'   =>  'Logout Berhasil'
            ]);
        } catch(Exception $e){
            return response()->json([
                'success'   =>  false,
                'message'   =>  ''.$e
            ]);
        }
    }
}
