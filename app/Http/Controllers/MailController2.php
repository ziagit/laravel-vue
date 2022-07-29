<?php

namespace App\Http\Controllers;

use App\Mail\TestEamil2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController2 extends Controller
{
    public function send(Request $request)
    {
        Mail::to($request->email)->queue(new TestEamil2($request->message));
        return response()->json("Emails sent !!!");
    }
}
