<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {

            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'role' => 'required|string|max:255',
                'phone_number' => 'required|string|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);

            $user = new User();
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->role = $request->input('role');
            $user->phone_number = $request->input('phone_number');
            $user->password = bcrypt($request->input('password')); 

            $user->save();

            return redirect('/login')->with('success', 'You are registered successfully.');
        }

        return view('register'); 
    }


    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $rules = [
            'login' => 'required|string',
            'password' => 'required|string',
        ];

        $request->validate($rules);

        $loginType = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'phone_number';

        $credentials = [
            $loginType => $request->input('login'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/home'); 
        } else {
            return back()->withErrors(['login' => 'Invalid credentials'])->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login'); 
    }

}
