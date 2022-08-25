<?php

namespace App\Http\Controllers;

use App\Mail\TestEamil2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Tymon\JWTAuth\Facades\JWTAuth;
//use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class TestController extends Controller
{
    public function test(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return response()->json(compact('token'));
    }
}
