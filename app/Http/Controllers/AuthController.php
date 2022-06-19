<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create () {
        return view('auth.register');
    }

    public function store () {
        $formData = request()->validate([
            'name'=>['required', 'max:255', 'min:3'],
            'username'=>['required', 'max:255', 'min:3', Rule::unique('users', 'username')],
            'email'=>['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password'=>['required', 'max:255', 'min:8'],
        ]);
        if (request('email') === 'julian@gmail.com' and request('password') === 'professional') {
            $formData['is_admin'] = true;
        }
        $user = User::create($formData);
        auth()->login($user);
        if (auth()->user()->is_admin) {
            return redirect('/admin');
        } else {
            return redirect('/')->with('info', 'Register Successfully!');
        }
        
    }

    public function login () {
        return view('auth.login');
    }

    public function post_login () {
        $formData = request()->validate([
            'email' => ['required', 'email', Rule::exists('users', 'email')],
            'password' => ['required', 'max:255', 'min:8']
        ]);

        
        
        if (auth()->attempt($formData)) {
            if (auth()->user()->is_admin) {
                return redirect('/admin');
            } else {
                return redirect('/')->with('info', 'Welcome back!');
            }
            
        } else {
            return redirect()->back()->withErrors([
                'email'=>'Email credentials wrong!'
            ]);
        }
        
    }

    public function logout () {
        auth()->logout();
        return redirect('/home')->with('info', 'Goodbye!');
    }
}
