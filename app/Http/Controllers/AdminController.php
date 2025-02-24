<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function createAdmin()
    {
        $admin = Admin::create([
            'username' => 'admin',
            'password' => Hash::make('123456'), // Parolni hash qilish shart!
        ]);

        return response()->json([
            'message' => 'Admin yaratildi!',
            'admin' => $admin
        ]);
    }
}

