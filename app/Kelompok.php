<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function data_kelompok()
    {
        return $this->hasMany('App\Data_kelompok', 'kelompok_id');
    }
}
