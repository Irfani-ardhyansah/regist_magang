<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class DataTransformer extends TransformerAbstract 
{
    public function transform(User $user)
    {
        return [
            'email'=> $user->email,
            'kelompok'  =>  $user->kelompok,
            'registered'    =>  $user->created_at->diffForHumans(),
        ];  
    }
}