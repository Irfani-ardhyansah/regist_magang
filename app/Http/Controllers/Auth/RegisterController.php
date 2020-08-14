<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Kelompok;
use App\Data_kelompok;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_ketua' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'universitas' => ['required'],
            'fakultas' => ['required'],
            'prodi' => ['required'],
            'alamat_univ' => ['required'],
            'kelompok' => ['required'],
            'jumlah_anggota' => ['required'],
            'periode_mulai' => ['required'],
            'periode_akhir' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        if(!empty($data['nama_ketua'])) {
                $data2 = array(
                    'user_id' => $user->id,
                    'universitas' => $data['universitas'],
                    'fakultas' => $data['fakultas'],
                    'prodi' => $data['prodi'],
                    'alamat_univ' => $data['alamat_univ'],
                    'kelompok' => $data['kelompok'],
                    'jumlah_anggota' => $data['jumlah_anggota'],
                    'periode_mulai' => $data['periode_mulai'],
                    'periode_akhir' => $data['periode_akhir'],
                    'nama_ketua' => $data['nama_ketua']
                );
                $kelompok = Kelompok::create($data2);
        }

        if(!empty($data['nama'])) {
            foreach ($data['nama'] as $item => $value) {
                $bidang = implode(",", $data['bidang_minat'][$item]);
                $data3 = array(
                    'kelompok_id' => $kelompok->id,
                    'nama' => $data['nama'][$item],
                    'nim' => $data['nim'][$item],
                    'jenis_kelamin' => $data['jenis_kelamin'][$item],
                    'no_hp' => $data['no_hp'][$item],
                    'status' => 0,
                    'sosmed' => $data['sosmed'][$item],
                    'email_anggota' => $data['email_anggota'][$item],
                    'alamat' => $data['alamat'][$item],
                    'bidang_minat' => $bidang,
                    'keahlian' => $data['keahlian'][$item],
                );
                Data_kelompok::create($data3);
            }
        }
        return $user;
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
}
