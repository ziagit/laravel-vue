<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class NotificationController extends Controller
{
    public function newMessage(Request $request)
    {
        
        broadcast(new NewMessage($request))->toOthers();
        return response()->json("Message sent.");
    }
}
