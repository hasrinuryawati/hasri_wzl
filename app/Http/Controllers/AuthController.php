<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        // $credentials = $request->only('email');

        $user = User::where('email',$request->email)->first();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data Not Found!',
            ], 400);
        }
        
        // Get the token
        $token = auth()->login($user);

        
        // $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $userApi = Auth::user();
        return response()->json([
                'code'   => 200,
                'status' => 'success',
                'user'   => $userApi,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ], 200);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

}
