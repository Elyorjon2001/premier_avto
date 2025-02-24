<?php
namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
{
    logger()->info('Login jarayoni boshlandi.', ['username' => $request->username]);

    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
        $admin = Auth::guard('admin')->user();
        
        session(['authenticated_admin' => $admin->id]);
        session()->save();

        Log::info('Sessionga saqlandi:', [
            'session_id' => session()->getId(),
            'authenticated_admin' => session('authenticated_admin'),
            'barcha_session' => session()->all()
        ]);

        return redirect()->route('home');
    }

    return back()->withErrors(['login' => 'Login yoki parol noto‘g‘ri!']);
}



    public function update()
    {
        return view('auth.update');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
            'new_username' => 'required|string|max:255|unique:admins,username',
        ]);
    
        $admin = Auth::guard('admin')->user();
    
        if (!$admin) {
            return back()->withErrors(['error' => 'Admin topilmadi!']);
        }
    
        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors(['current_password' => 'Joriy parol noto‘g‘ri!']);
        }
    
        $admin->username = $request->new_username;
        $admin->password = Hash::make($request->new_password);
    
        try {
            $admin->save(); // ✅ Saqlash
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Xatolik yuz berdi: ' . $e->getMessage()]);
        }
    
        return back()->with('success', 'Username va parol muvaffaqiyatli yangilandi.');
    }
    
    
    public function logout(Request $request)
    {
        Log::info('Logout qilindi. Eski sessiya:', session()->all());
    
        $request->session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('home');
    }
    
    
}
