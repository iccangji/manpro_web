<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login', [
            'title' => 'SportKy | Login',
        ]);
    }
    public function signup(Request $request)
    {
        $data = $request->validate([
            'user' => 'required|unique:users|alpha_dash',
            'name' => '',
            'password' => '',
        ]);
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        // $request->session()->flash('success', 'Akun berhasil didaftarkan');
        $request->session()->flash('success', 'Akun berhasil didaftarkan');

        return redirect('/login');
    }
    public function login(Request $request)
    {
        $data = $request->validate([
            'user' => '',
            'password' => '',
        ]);
        // $data['password'] = Hash::make($data['password']);
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            $user = User::where('name', auth()->user()->name)->value('name');
            $request->session()->flash('log', 'Selamat datang, ' . $user);
            return redirect()->intended('/');
        }
        // dd($data);
        return back()->with('loginError', 'User atau Password salah');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/login');
    }
    public function special_signup()
    {
        // if (auth()->user()->level == 'admin') {
        //     dd('ok');
        // }
        return view('login.special-signup', [
            'title' => 'Special Sign Up',
        ]);
    }
    public function special_signup_create(Request $request)
    {
        $data = $request->validate([
            'user' => 'required|unique:users|alpha_dash',
            'name' => '',
            'password' => '',
            'level' => '',
        ]);
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        // $request->session()->flash('success', 'Akun berhasil didaftarkan');
        $request->session()->flash('success', 'Akun berhasil didaftarkan');

        return redirect('/special_signup');
    }
}
