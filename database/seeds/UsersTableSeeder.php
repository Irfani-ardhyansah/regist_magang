<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => 'admin@kreasikode.com',
            'password' => Hash::make('password')
        ]);
        $user->syncRoles('admin');
    }
}
