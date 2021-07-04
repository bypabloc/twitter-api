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
    public function register(Request $req)
    {
        $errors = [];

        $name = isset($req->name) ? $req->name : null;
        $email = isset($req->email) ? $req->email : null;
        $nickname = isset($req->nickname) ? $req->nickname : null;
        $password = isset($req->password) ? $req->password : null;
        $device = $req->hasHeader('device') ? $req->header('device') : null;

        if (empty($name)) {
            $errors = [...$errors, 'No indicó un nombre'];
        }
        if (empty($email)) {
            $errors = [...$errors, 'No indicó un correo'];
        }
        if (empty($user)) {
            $errors = [...$errors, 'No indicó un usuario'];
        }
        if (empty($password)) {
            $errors = [...$errors, 'No indicó una contraseña'];
        }
        if (empty($device)) {
            $errors = [...$errors, 'No indicó un dispositivo'];
        }

        if (!empty($errors)) {
            return response()->json([
                'errors' => $errors,
            ], 422);
        }

        $errors = [];

        $queryEmail = User::where('email',$email)->first();
        $queryNickname = User::where('nickname',$nickname)->first();

        if (!empty($queryEmail)) {
            $errors = [...$errors, 'El correo ya fue indicado'];
        }
        if (!empty($queryNickname)) {
            $errors = [...$errors, 'El usuario ya fue indicado'];
        }

        if (!empty($errors)) {
            return response()->json([
                'errors' => $errors,
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
            'token' => $req->user()->createToken($device)->plainTextToken,
        ]);
    }

    public function validateRegister(Request $req)
    {
        return $req->validate([
            'name' => 'required',
            'email' => 'required',
            'nickname' => 'required',
            'password' => 'required',
            'device' => 'required',
        ]);
    }
}
