<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function create()
    {
        return view('pages.reg');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6', 'confirmed'],
            'password_confirmation' => ['required'],
        ], [
            'name.required' => 'Введите имя',
            'email.required' => 'Введите почту',
            'email.email' => 'Введите корректную почту',
            'email.unique' => 'Эта почта уже используется',
            'password.required' => 'Введите пароль',
            'password.min' => 'В пароле должно быть минимум 6 символов',
            'password.confirmed' => 'Пароли не совпадают',
            'password_confirmation.required' => 'Введите подтверждение пароля',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('auth.login');
    }

    public function login()
    {
        return view('pages.login');
    }

    public function log(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Введите почту',
            'password.required' => 'Введите пароль',
        ]);

        if(!Auth::attempt($data)){
            throw ValidationException::withMessages([
                'email' => 'Неверная почта или пароль'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('index');
    }

    public function logout(Request $request) {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('index');
    }
}
