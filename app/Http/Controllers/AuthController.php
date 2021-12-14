<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required | email',
            'password' => 'required'
        ]);
        // check email
        $user = User::where('email', $request->email)->first();
        // check password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => "Bad Credentials"
            ], 401);
        }
        $token = $user->createToken($user->email);
        return response(["token" => $token->plainTextToken], 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->token()->delete();
    }
}

