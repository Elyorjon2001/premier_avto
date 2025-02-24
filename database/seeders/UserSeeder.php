<?php

namespace Database\Seeders;

use App\Models\User; // Bu qator User modelini yuklash uchun
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = new User();
        $user->username = 'admin';
        $user->password = Hash::make('123'); // Hashlangan parol
        $user->save();
    }
}
