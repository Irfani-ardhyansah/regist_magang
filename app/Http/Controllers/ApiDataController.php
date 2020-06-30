<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Kelompok;
use App\Data_kelompok;
use App\Transformers\DataTransformer;
use App\Transformers\KelompokTransformer;
use App\Transformers\DataKelompokTransformer;

class ApiDataController extends Controller
{
    public function users()
    {
        $user = User::where('name', NULL)->get();

        return fractal()
            ->collection($user)
            ->transformWith(new DataTransformer)
            ->toArray();
    }

    public function kelompok()
    {
        $kelompok = Kelompok::all();

        return fractal()
            ->collection($kelompok)
            ->transformWith(new KelompokTransformer)
            ->toArray();
    }

    public function data_kelompok()
    {
        $data_kelompok = Data_kelompok::all();

        return fractal()
            ->collection($data_kelompok)
            ->transformWith(new DataKelompokTransformer)
            ->toArray();
    }
}
