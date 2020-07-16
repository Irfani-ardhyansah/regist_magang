<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

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
            'user' => Auth::user()
        ]);
    }

    public function register(Request $request)
    {
        $encryptedPass = Hash::make($request->password);

        $user = new User;

        try{
            $user->email = $request->email;
            $user->password = $encryptedPass;
            $user->save();
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
