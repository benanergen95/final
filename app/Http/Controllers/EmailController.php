<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use DB;
use App\Mail\results;

class EmailController extends Controller
{
    //
    public function sendemail(Request $request)
    {
        $email = Auth::User()->email;                                         //send results email to the users email addresss
        \Mail::to($email)->send(new results);
        return back()->with('success', 'Please check your inbox');
    }

    public function sendcemail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email'
        ]);

        $email = $request->input('email');                                //send results email to the users custom email addresss
        \Mail::to($email)->send(new results);
        return back()->with('success', 'Please check your custom email inbox');
    }
}
