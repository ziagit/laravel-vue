<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $request->validate(([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:3',
                'comfirm_password' => 'required|same:password'
            ]));
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json("Registered successfuly.");
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');
            if ($token = JWTAuth::attempt($credentials)) {
                return response()->json($token);
            }
            return response()->json("Could not create token");
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
    public function logout()
    {
        $forever = true;
        JWTAuth::parseToken()->invalidate($forever);
        return response()->json("Loged out.");
    }
    public function me()
    {
        return response()->json(JWTAuth::user());
    }
}
