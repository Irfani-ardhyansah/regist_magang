<?php

namespace App\Transformers;

use App\Data_kelompok;
use League\Fractal\TransformerAbstract;

class DataKelompokTransformer extends TransformerAbstract
{
    public function transform(Data_kelompok $detail)
    {
        return [
            'nama' => $detail->nama,
            'nim' => $detail->nim,
            'no_hp' => $detail->no_hp,
            'sosmed' => $detail->sosmed,
            'jenis_kelamin' => $detail->jenis_kelamin,
            'email_anggota' => $detail->email_anggota,
            'alamat' => $detail->alamat,
            'keahlian' => $detail->kealian,
        ];
    }
}