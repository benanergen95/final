<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parents;
use App\User;
use DB;
use Validator;
use Carbon\Carbon;


class RegistrationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validating input values
        $this->validate($request, [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'type' => 'required',
            'other-type' => 'required-if:type,"Other"',
            'email' => 'required|email',
            'password' => 'required|string|min:5|confirmed',

        ]);

        // Store input value in a variable
        $user = User::where('email', '=', $request->input('email'));

        // Update the record in the database
        if ($user->exists()) {
            if (is_null($user->first()->email_verified_at)) {
                // Update 'Users' table
                DB::table('users')->where('email', $request->input('email'))
                    ->update([
                        'fname' => $request->input('firstname'), // Retrieve First Name
                        'lname' => $request->input('lastname'), // Retrieve Last Name
                        'email_verified_at' => Carbon::now()->toDateTimeString(), //Retrieve Email Address
                        'password' => \Hash::make($request->input('password'))
                    ]);


                // Update 'Parents' table
                // Determine if the other radio button is checked
                if ($request->input('type') === 'Other') {
                    DB::table('users')->where('email', $request->input('email'))
                        ->update([
                            'pType' => $request->input('other-type'), // Retrieve user type
                        ]);
                } else {
                    DB::table('users')->where('email', $request->input('email'))
                        ->update([
                            'pType' => $request->input('type'), // Retrieve user type
                        ]);
                }

                return redirect('/Login')->with('success', 'Account has been created.');
            } else {
                return redirect('Registration')->withInput()->with('error', 'Your e-mail has been used. Please contact Dr Amabile Dario for further information about the Healthy Start Research project. Email: amabile.dario@sydney.edu.au Phone 0451 201 496');
            }
        } else {
            return redirect('Registration')->withInput()->with('error', 'Your e-mail is not registered. Please contact Dr Amabile Dario for further information about the Healthy Start Research project. Email: amabile.dario@sydney.edu.au Phone 0451 201 496');
        }

    }

}
