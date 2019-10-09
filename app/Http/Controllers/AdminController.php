<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function Addemail(Request $request)
    {
        $this->validate($request, [
            'AddEmail' => 'required|email|unique:users,email'
        ]);                                                                         //verify email 
        $AddEmail = $request->input('AddEmail');
        DB::table('users')
            ->insert(['email' => $AddEmail]);                                       //add invitie email to the users tbale
        return back();
    }

    public function deleteemail($email)
    {
        DB::table('users')//Admin can deleate email of the users who are not registred
        ->where('email', '=', $email)
            ->delete();
        return back();
    }

    public function viewUsers(Request $request)
    {
        $nonRegistredusers = DB::table('users')->whereNull('password')->orderBy('id', 'DESC')->get();      //return list of non registed users list to the admin page
        $Registredusers = DB::table('users')->whereNotNull('password')->orderBy('id', 'DESC')->get();       //return list of registed users list to the admin page
        return view('AdminAddUser', compact('nonRegistredusers', 'Registredusers'));
    }

    public function ChildTable(Request $request)
    {
        $child = DB::table('child')->orderBy('parentID', 'ASC')->get();                                               //return child table values to the Admin page
        return view('Admin', compact('child'));
    }
}