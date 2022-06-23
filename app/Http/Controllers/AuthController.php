<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\BaseController;
use App\Models\User;

class AuthController extends Controller
{
    //user register
    public function registerUser(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',

        ]);

        $user = User::create([
            'name' => $fields['name'],
            'username' => $fields['username'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);
        $token = $user->createToken('token', ['user'])->plainTextToken;


        $response = [
            'code' => 201,
            'message' => 'User Berhasil Dibuat',
            'data' => $user,
            'token' => $token,
        ];
        return response($response, 201);
    }

    public function loginUser(Request $request)
    {
        //validation request on body
        $fields = $request->validate([
            'email' => 'required|string', //uniqe terhadap tabel users dan field email
            'password' => 'required|string',
        ]);

        //check email
        $user = User::where('email', $fields['email'])->first(); //query

        //check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Email atau Password Salah'
            ], 401);
        }
        $token = $user->createToken('token', ['user'])->plainTextToken;

        $response = [
            'code' => 200,
            'message' => 'Login User Berhasil',
            'data' => $user,
            'token' => $token,
        ];
        return response($response, 200);
    }
    
    public function logoutUser(Request $request)
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'Logout Succedd'
        ];
    }
}
