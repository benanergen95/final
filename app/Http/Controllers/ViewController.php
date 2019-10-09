<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Child;
use App\Entries;
use App\Parents;
use App\Results;
use App\User;
use View;

class ViewController extends Controller
{
    // Redirect user to the test page.
    public function viewTest()
    {

        if (empty(Auth::user()->currentChild)) {
            return redirect('ChildRegistration');
        }

        if (isset(Auth::user()->email)) {
            return redirect('Home');
        }
    }

    // Prevent user from entering Overall Results page if they haven't complete all the questionnaire yet.
    public function denyResult()
    {
        if (empty(Auth::user()->currentChild)) {
            return redirect('ChildRegistration');
        }

        if (isset(Auth::user()->email)) {
            return redirect('Home')->with('error', "You have not completed all the tests yet.");
        }

    }
}
