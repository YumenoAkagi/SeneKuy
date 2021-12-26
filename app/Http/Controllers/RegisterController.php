<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:8',
            'confirmPassword' => 'required'
        ]);

        // dd('registrasi berhasil');
        $validatedData['password'] = bcrypt($validatedData['password']);
        // $validatedData['confirmPassword'] = bcrypt($validatedData['confirmPassword']);
        User::create($validatedData);
        return redirect('/login')->with('success', 'Registration success!');
    }
}
