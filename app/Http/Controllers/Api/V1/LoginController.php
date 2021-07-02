<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validateLogin($request);

        $credentials = [
            'password' => $request->password,
        ];

        if (filter_var($request->user, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $request->user;
        }else{
            $credentials['nickname'] = $request->user;
        }

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

    public function validateLogin(Request $request)
    {
        return $request->validate([
            'user' => 'required',
            'password' => 'required',
            'device' => 'required'
        ]);
    }
}
