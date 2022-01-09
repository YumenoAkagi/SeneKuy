<?php

namespace App\Http\Controllers;

use App\Models\Role;
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
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required'
        ]);

        

        $validatedData['password'] = bcrypt($validatedData['password']);
        // dd($validatedData, $cust_role_id);
        User::create($validatedData);
        return redirect('/login')->with('success', 'Registration success!');
    }
}
