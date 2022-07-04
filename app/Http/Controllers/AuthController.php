<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            return redirect(route('dashboard'));
        } else {
            return redirect(route('login'))->withInput()->with('flash', [
                'error' => true,
                'msg' => 'Email/Password is invalid'
            ]);
        }
    }

    public function register(UserCreateRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['password'] = bcrypt($validated['password']);
            User::create($validated);
            return redirect(route('login'))->with('flash', [
                'error' => false,
                'msg' => 'Account registered, please login to continue'
            ]);
        } catch (\Exception $e) {
            return redirect(route('login'))->withInput()->with('flash', [
                'error' => true,
                'msg' => 'Failed to register an account'
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
