<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $this->validateRegister($request);

        return [
            'nickname' => 'nickname',
            'email' => 'email',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'remember_token' => Str::random(10),
        ];

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        return response()->json([
            'token' => $request->user()->createToken($request->device)->plainTextToken,
            'message' => 'success'
        ]);
    }

    public function validateRegister(Request $request)
    {
        return $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nickname' => 'required',
            'password' => 'required',
        ]);
    }
}
