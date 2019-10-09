<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Child;
use DB;

class LoginController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function validatelogin(Request $request)
    {
        // Validate input value
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string|min:5'
        ]);

        // Store input value in an array
        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->input('password')
        );

        $checkPassword = User::where('email', '=', $request->input('email'))->first();

        // check if user's password is null
        if (isset($checkPassword->password)) {
            // check user's email and password are correct
            if (Auth::attempt($user_data)) {
                return redirect('Tests');
            } else {
                return back()->withInput()->with('error', 'Wrong Login Details');
            }
        } else {
            return back()->withInput()->with('error', 'Wrong Login Details');
        }
        return redirect()->to('/Login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request)
    {
        // Validate input value
        $this->validate($request, [
            'password_current' => 'required|string|min:5',
            'password_new' => 'required|string|min:5|different:password_current',
            'password_new_confirm' => 'min:5|required_with:password_new|same:password_new'
        ]);

        // Retrieve input value
        $oldPassword = $request->input('password_current');
        $confirmPassword = $request->input('password_new_confirm');

        $user = User::where('email', '=', Auth::user()->email)->first();

        // Check if entered password matches the old password in DB.
        if (\Hash::check("$oldPassword", "$user->password")) {
            // change password
            DB::table('users')->where('email', '=', Auth::user()->email)
                ->update([
                    'password' => \Hash::make($confirmPassword)
                ]);
            return back()->with('success', 'Password Changed.');
        } else {
            return back()->with('error', 'Incorrect Current Password.');
        }
        return redirect()->to('/Login');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        //
        Auth::logout();

        return redirect('Login');

    }
}
