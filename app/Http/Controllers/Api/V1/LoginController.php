<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $req)
    {
        $this->validateLogin($req);

        $credentials = [
            'password' => $req->password,
        ];

        if (filter_var($req->user, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $req->user;
        }else{
            $credentials['nickname'] = $req->user;
        }

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'errors' => ['Unauthorized']
            ], 401);
        }

        return response()->json([
            'token' => $req->user()->createToken($req->device)->plainTextToken,
        ]);
    }

    public function validateLogin(Request $req)
    {
        return $req->validate([
            'user' => 'required',
            'password' => 'required',
            'device' => 'required'
        ]);
    }
}
