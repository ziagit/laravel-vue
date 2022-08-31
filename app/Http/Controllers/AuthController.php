<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json("Faild to create token", 500);
            }
            return response()->json($token);
        } catch (JWTException $e) {
            return response()->json($e->getMessage());
        }
    }
    public function register(Request $request)
    {
        // try {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3',
            'password_confirm' => 'required|same:password'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json("Saved successfuly.");
        // } catch (Exception $e) {
        //     return response()->json($e->getMessage());
        // }
    }
    public function me()
    {
        return JWTAuth::user();
    }
    public function logOut()
    {
        $forever = true;
        JWTAuth::parseToken()->invalidate($forever);
        return response()->json("Log out success.");
    }
}
