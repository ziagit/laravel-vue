<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function send(Request $request)
    {
        dispatch(new SendEmail($request->email, $request->message));
        return response()->json("Emails sent !!!");
    }
}
