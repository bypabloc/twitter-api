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
        $errors = [];

        $user = isset($req->user) ? $req->user : null;
        $password = isset($req->password) ? $req->password : null;
        $device = $req->hasHeader('device') ? $req->header('device') : null;

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

        $credentials = [
            'password' => $password,
        ];

        $where = [];

        if (filter_var($user, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $user;
            $where['type'] = 'email';
            $where['user'] = $user;
        }else{
            $credentials['nickname'] = $user;
            $where['type'] = 'nickname';
            $where['user'] = $user;
        }

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'errors' => ['Unauthorized']
            ], 401);
        }
        
        $queryResult = User::where($where['type'],$where['user'])->first();

        /*
            if(!$user->tokens()->where('name', $request->device_name)->first()) {
                return $user->createToken($request->device_name)->plainTextToken;
            }
            return $user->plainTextToken($request->device_name);
        */

        return response()->json([
            'token' => $req->user()->createToken($device)->plainTextToken,
            'name' => $queryResult['name'],
            'nickname' => $queryResult['nickname'],
            'email' => $queryResult['email'],
        ]);
    }
    
    public function logout(Request $req)
    {
        Auth::user()->tokens()->delete();

        // Auth::user()->tokens()->where('id', $id)->delete();

        return response()->json([
            'message' => ['Deslogueo exitoso'],
        ]);
    }


}
