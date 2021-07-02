<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use \App\Models\User;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $this->validateRegister($request);

        $name = $request->name;
        $nickname = $request->nickname;
        $email = $request->email;
        $password = $request->password;

        $queryResult = User::where('email',$email)->first();
        if (!empty($queryResult)) {
            return response()->json([
                'errors' => ['El correo ya fue indicado'],
            ], 422);
        }

        $queryResult = User::where('nickname',$nickname)->first();
        if (!empty($queryResult)) {
            return response()->json([
                'errors' => ['El usuario ya fue indicado'],
            ], 422);
        }

        $user = new User;
        $user->name = $name;
        $user->nickname = $nickname;
        $user->email = $email;
        $user->email_verified_at = now();
        $user->password = Hash::make($password);
        $user->remember_token = Str::random(10);
        $user->save();

        if (!Auth::attempt([
            'nickname' => $nickname,
            'password' => $password,
        ])) {
            return response()->json([
                'errors' => ['Unauthorized'],
            ], 401);
        }

        return response()->json([
            'token' => $request->user()->createToken($request->device)->plainTextToken,
        ]);
    }

    public function validateRegister(Request $request)
    {
        return $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nickname' => 'required',
            'password' => 'required',
            'device' => 'required',
        ]);
    }
}
