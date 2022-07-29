<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(Request $request)
    {
        Mail::to('zia.csco@gmail.com')->queue(new TestMail($request->message));
        return response()->json("Emails sent !!!");
    }
}
