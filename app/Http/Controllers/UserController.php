<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function attempt(LoginUserRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('admin');
        }
        return redirect('login');
    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterUserRequest $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required|confirmed',
        ]);
        $data = User::create($request->all());
        auth()->login($data);
        return redirect('admin');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('login');
    }
}
