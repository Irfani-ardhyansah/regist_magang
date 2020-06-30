<?php

namespace App\Transformers;

use App\Kelompok;
use League\Fractal\TransformerAbstract;

class KelompokTransformer extends TransformerAbstract
{
    public function transform(Kelompok $kelompok)
    {
        return [
            'universitas' => $kelompok->universitas,
            'coba' => $kelompok->data_kelompok,
            'fakultas' => $kelompok->fakultas,
            'prodi' => $kelompok->prodi,
            'alamat_univ' => $kelompok->alamat_univ,
            'kelompok' => $kelompok->kelompok,
            'jumlah_anggota' => $kelompok->jumlah_kelompok,
            'periode_mulai' => $kelompok->periode_mulai,
            'periode_akhir' => $kelompok->periode_akhir,
            'nama_ketua' => $kelompok->nama_ketua,
        ];
    }
}
