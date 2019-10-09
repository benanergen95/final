<?php

namespace App\Http\Controllers;

use App\Child;
use App\User;
use App\Entries;
use App\Results;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;


class ChildController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function registerChild(Request $request)
    {
        // Input must be after 12 years
        $DateAfterStr = strtotime("-12 year", time());
        $DateAfter = date("Y-m-d", $DateAfterStr);
        // Input must be before 4 years
        $DateBeforeStr = strtotime("-5 year", time());
        $DateBefore = date("Y-m-d", $DateBeforeStr);

        $this->validate($request, [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'dob' => 'required|date|after:' . $DateAfter . '|before:' . $DateBefore . '|date_format:Y-m-d',
            'sex' => 'required'
        ]);


        $child = new Child([
            'parentID' => \Auth::user()->id,
            'CfName' => $request->input('firstname'), // Retrieve First Name
            'ClName' => $request->input('lastname'), // Retrieve Last Name
            'DOB' => $request->input('dob'),
            'age' => Carbon::createFromFormat("Y-m-d", $request->input('dob'))->age,
            'sex' => $request->input('sex') // Retrieve gender
        ]);

        $child->save();

        $result = new Results([
            'childID' => $child->id,
            'CfName' => $child->CfName
        ]);

        $result->save();

        $entry = new Entries([
            'childID' => $child->id
        ]);

        $entry->save();

        DB::table('users')
            ->where('id', \Auth::user()->id)
            ->update(['currentChild' => $child->id]);

        return redirect('/Tests');
    }

   public function thisChild(Request $request){
       $childID = $request->get('id');
       DB::table('users')
       ->where('id', \Auth::user()->id)
       ->update(['currentChild' => $childID]);

       return redirect('/Tests');
   } 
    /**
     * Display the specified resource.
     *
     * @param  \App\Child $child
     * @return \Illuminate\Http\Response
     */
    public function show(Child $child)
    {
        //
        $child = Child::all();
        return view('Tests', compact('child'));
    }
}

