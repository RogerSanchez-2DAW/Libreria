<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $token = Auth::login($user);

        return response()->json(['token' => $token]);

    }

    public function login(Request $request){
        $credentials = $request->only(['email', 'password']);
        if(!Auth::attempt($credentials)){
            return response()->json(['error' => 'Credencales invalidas'], 401);
        }

        $token = Auth::user()->createToken('token')->accessToken;

        return response()->json(['token' => $token]);
    }

}
