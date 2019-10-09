<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Entries;
use App\Child;
use App\Results;
use DB;
use Carbon\Carbon;
use Auth;


class StoreAnswerController extends Controller
{
    //BMI Store height
    public function storeHeight(Request $request)
    {
        $this->validate($request, [
            'height' => 'required|numeric|between:60,200',

        ]);

        $height = $request->input('height');

        DB::table('entries')
            ->where('childID', \Auth::user()->currentChild)
            ->update(['height' => $height]);


        return redirect('/Weight3');
    }


    //BMI Store Weight
    public function storeWeight(Request $request)
    {
        $this->validate($request, [

            'weight' => 'required|numeric|between:5,99',
        ]);

        $weight = $request->input('weight');

        DB::table('entries')
            ->where('childID', \Auth::user()->currentChild)
            ->update(['weight' => $weight]);

        return redirect('/Weight4-1');
    }

    //BMI Store Waist
    public function storeWaist(Request $request)
    {
        $this->validate($request, [

            'waist' => 'required|numeric|between:20,150',
        ]);

        $waist = $request->input('waist');

        DB::table('entries')
            ->where('childID', \Auth::user()->currentChild)
            ->update(['waist' => $waist]);

        $height = DB::table('entries')
            ->where('childID', \Auth::user()->currentChild)
            ->value('height');

        $whr = $waist / $height;
        $whr = round($whr, 1);

        DB::table('entries')
            ->where('childID', \Auth::user()->currentChild)
            ->update(['WHR_v' => $whr]);

        if ($whr < 0.5) {
            $WHRr = '0'; //Normal
        } else {
            $WHRr = '1';  //Overweight
        }


        DB::table('results')
            ->where('childID', \Auth::user()
                ->currentChild)
            ->update(['Rwhr' => $WHRr]);

        return redirect('/Weight4');
    }


    // Dietary Habit


    //
    public function storeFruits(Request $request)
    {
        // Validating Input
        $this->validate($request, [
            'fruits' => 'required|between:0,8'
        ]);

        // Retrieve input
        $fruits = $request->input('fruits');

        // Store in 'Entries' table
        DB::table('entries')
            ->where('childID', \Auth::user()->currentChild)
            ->update(['fruits' => $fruits]);

        $this->calculateFruits($fruits);

        return redirect('/Diet2');
    }

    public function storeVeggies(Request $request)
    {
        // Validating Input
        $this->validate($request, [
            'veggies' => 'required|between:0,8'
        ]);

        // Retrieve input
        $veggies = $request->input('veggies');

        // Store in 'Entries' table
        DB::table('entries')
            ->where('childID', \Auth::user()->currentChild)
            ->update(['veggies' => $veggies]);

        $this->calculateVeggies($veggies);

        return redirect('/Diet3');
    }

    /* Retrieve parameter from storeFruits;
    *  Calculate and store result in Results Table
    *  0 = Consuming recommended serves
    *  1 = Not consuming recommended serves
    */
    public function calculateFruits($fruits)
    {
        $child = DB::table('child')
            ->where('childID', \Auth::user()->currentChild)
            ->first();

        // Retrieve child age from DB
        $childAge = $child->age;
        // Retrieve child sex(gender) from DB
        $childGender = $child->sex;

        // Check child age first
        if ($childAge >= 5 && $childAge <= 8) {
            // Check if fruit intake is healthy or not
            if ($fruits >= 1.5) {
                DB::table('results')
                    ->where('childID', \Auth::user()->currentChild)
                    ->update(['RfruitsIntake' => 0]);
            } else {
                DB::table('results')
                    ->where('childID', \Auth::user()->currentChild)
                    ->update(['RfruitsIntake' => 1]);
            }
        } else {
            // Check if fruit intake is healthy or not
            if ($fruits >= 2) {
                DB::table('results')
                    ->where('childID', \Auth::user()->currentChild)
                    ->update(['RfruitsIntake' => 0]);
            } else {
                DB::table('results')
                    ->where('childID', \Auth::user()->currentChild)
                    ->update(['RfruitsIntake' => 1]);
            }
        }


    }

    /* Retrieve parameter from storeVeggies;
    *  Calculate and store result in Results Table
    *  0 = Consuming recommended serves
    *  1 = Not consuming recommended serves
    */
    public function calculateVeggies($veggies)
    {

        $child = DB::table('child')
            ->where('childID', \Auth::user()->currentChild)
            ->first();

        // Retrieve child age from DB
        $childAge = $child->age;
        // Retrieve child sex(gender) from DB
        $childGender = $child->sex;

        // Check child age first
        if ($childAge >= 5 && $childAge <= 8) {
            // Check if veggies intake is healthy or not
            if ($veggies >= 4.5) {
                DB::table('results')
                    ->where('childID', \Auth::user()->currentChild)
                    ->update(['RveggiesIntake' => 0]);
            } else {
                DB::table('results')
                    ->where('childID', \Auth::user()->currentChild)
                    ->update(['RveggiesIntake' => 1]);
            }
        } // Check child age and if they're male or not
        elseif ($childGender == "Male" && $childAge == 12) {
            // Check if veggies intake is healthy or not
            if ($veggies >= 5.5) {
                DB::table('results')
                    ->where('childID', \Auth::user()->currentChild)
                    ->update(['RveggiesIntake' => 0]);
            } else {
                DB::table('results')
                    ->where('childID', \Auth::user()->currentChild)
                    ->update(['RveggiesIntake' => 1]);
            }
        } elseif ($childAge > 8 && $childAge <= 12) {
            // Check if veggies intake is healthy or not
            if ($veggies >= 5) {
                DB::table('results')
                    ->where('childID', \Auth::user()->currentChild)
                    ->update(['RveggiesIntake' => 0]);
            } else {
                DB::table('results')
                    ->where('childID', \Auth::user()->currentChild)
                    ->update(['RveggiesIntake' => 1]);
            }
        }
    }

    // Exercise (Physical Activity)
    public function storeExercise(Request $request)
    {
        // Validating Input
        $this->validate($request, [
            'time' => 'required|date_format:H:i'
        ]);

        // Retrieve input
        $exercise = $request->input('time');

        // Store in 'Entries' table
        DB::table('entries')
            ->where('childID', \Auth::user()->currentChild)
            ->update(['exercise' => $exercise]);

        $this->calculateExercise($exercise);

        return redirect('/Exercise2');
    }

    /* Retrieve parameter from storeExercise;
    *  Calculate and store result in Results Table
    *  0 = Equal or more than 60 minutes of exercise
    *  1 = Less than 60 minutes of exercise
    */
    public function calculateExercise($exercise)
    {
        $child = DB::table('child')
            ->where('childID', \Auth::user()->currentChild)
            ->first();

        // Check the amount exercise is health or not
        if ($exercise >= date('H:i', strtotime('1:00'))) {
            DB::table('results')
                ->where('childID', \Auth::user()->currentChild)
                ->update(['Rexercise' => 0]);
        } else {
            DB::table('results')
                ->where('childID', \Auth::user()->currentChild)
                ->update(['Rexercise' => 1]);
        }


    }

    //Sedentary Behaviour
    //SD = School Days
    public function storeScreenSD(Request $request)
    {
        // Validating Input
        $this->validate($request, [
            'screenSD' => 'required|numeric|between:0,10'
        ]);

        // Retrieve input
        $screenSD = $request->input('screenSD');

        // Store in 'Entries' table
        DB::table('entries')
            ->where('childID', \Auth::user()->currentChild)
            ->update(['screenTimeSD' => $screenSD]);

        $this->calculateScreenSD($screenSD);

        return redirect('/ScreenTime3');
    }

    // NSD = Non- School Days
    public function storeScreenNSD(Request $request)
    {
        // Validating Input
        $this->validate($request, [
            'screenNSD' => 'required|numeric|between:0,18'
        ]);

        // Retrieve input
        $screenNSD = $request->input('screenNSD');

        // Store in 'Entries' table
        DB::table('entries')
            ->where('childID', \Auth::user()->currentChild)
            ->update(['screenTimeNSD' => $screenNSD]);

        $this->calculateScreenNSD($screenNSD);

        return redirect('/ScreenTime4');
    }

    /* Retrieve parameter from storeScreenSD;
    *  Calculate and store result in Results Table
    *  0 = Less than 2 hours of screen time
    *  1 = Equal or than than 2 hours of screen time
    */
    public function calculateScreenSD($screenSD)
    {
        $child = DB::table('child')
            ->where('childID', \Auth::user()->currentChild)
            ->first();

        // check if screen time is equal or more than two hours
        if ($screenSD >= 2) {
            DB::table('results')
                ->where('childID', \Auth::user()->currentChild)
                ->update(['RscreentimeSD' => 1]);
        } else {
            DB::table('results')
                ->where('childID', \Auth::user()->currentChild)
                ->update(['RscreentimeSD' => 0]);
        }


    }

    /* Retrieve parameter from storeScreenNSD;
    *  Calculate and store result in Results Table
    *  0 = Less than 2 hours of screen time
    *  1 = Equal or than than 2 hours of screen time
    */
    public function calculateScreenNSD($screenNSD)
    {
        $child = DB::table('child')
            ->where('childID', \Auth::user()->currentChild)
            ->first();

        // check if screen time is equal or more than two hours
        if ($screenNSD >= 2) {
            DB::table('results')
                ->where('childID', \Auth::user()->currentChild)
                ->update(['RscreentimeNSD' => 1]);
        } else {
            DB::table('results')
                ->where('childID', \Auth::user()->currentChild)
                ->update(['RscreentimeNSD' => 0]);
        }


    }

    // Sleeping Habit
    // SD = School Days
    public function storeSleepSD(Request $request)
    {
        // Validating Input
        $this->validate($request, [
            'SleepTime' => 'required|date_format:"g:i A"',
            'AwakeTime' => 'required|date_format:"g:i A"'
        ]);

        // Retrieve input
        $sleepSD = strtotime($request->input('SleepTime'));
        $wakeSD = strtotime($request->input('AwakeTime'));

        //calculate the difference between the two times, won't return negative
        $difference = $wakeSD - $sleepSD;
        $time = date("H:i", $difference); //format the string to time

        // Store in 'Entries' table
        DB::table('entries')
            ->where('childID', \Auth::user()->currentChild)
            ->update(['sleepSD' => $time]);

        $this->calculateSleepSD($time);

        return redirect('/Sleep2');
    }

    // NSD = Non- School Days
    public function storeSleepNSD(Request $request)
    {
        // Validating Input
        $this->validate($request, [
            'SleepTime' => 'required|date_format:"g:i A"',
            'AwakeTime' => 'required|date_format:"g:i A"'
        ]);

        // Retrieve input
        $sleepNSD = strtotime($request->input('SleepTime'));
        $wakeNSD = strtotime($request->input('AwakeTime'));

        //calculate the difference between the two times, won't return negative
        $difference = $wakeNSD - $sleepNSD;
        $time = date("H:i", $difference); //format the string to time

        // Store in 'Entries' table
        DB::table('entries')
            ->where('childID', \Auth::user()->currentChild)
            ->update(['sleepNSD' => $time]);

        $this->calculateSleepNSD($time);

        return redirect('/Sleep3');
    }

    /* Retrieve parameter from storeSleepSD;
    *  Calculate and store result in Results Table
    *  0 = Within recommended Sleep Time (9<= time <=11)
    *  1 = Less than 9 hours of sleep
    *  2 = More than 11 hours of sleep
    */
    public function calculateSleepSD($sleepSD)
    {
        $child = DB::table('child')
            ->where('childID', \Auth::user()->currentChild)
            ->first();

        // convert parameter from string to date
        $sleepSD = date('H:i', strtotime($sleepSD));

        // check if child slept more than 11 hours
        if ($sleepSD > date('H:i', strtotime('11:00'))) {
            DB::table('results')
                ->where('childID', \Auth::user()->currentChild)
                ->update(['RStimeSD' => 2]);
        } // check if child slept less than 9 hours
        elseif ($sleepSD < date('H:i', strtotime('9:00'))) {
            DB::table('results')
                ->where('childID', \Auth::user()->currentChild)
                ->update(['RStimeSD' => 1]);
        } else {
            DB::table('results')
                ->where('childID', \Auth::user()->currentChild)
                ->update(['RStimeSD' => 0]);
        }
    }

    /* Retrieve parameter from storeSleepNSD;
    *  Calculate and store result in Results Table
    *  0 = Within recommended Sleep Time (9<= time <=11)
    *  1 = Less than 9 hours of sleep
    *  2 = More than 11 hours of sleep
    */
    public function calculateSleepNSD($sleepNSD)
    {
        $child = DB::table('child')
            ->where('childID', \Auth::user()->currentChild)
            ->first();

        // convert parameter from string to date
        $sleepNSD = date('H:i', strtotime($sleepNSD));

        // check if child slept more than 11 hours
        if ($sleepNSD > date('H:i', strtotime('11:00'))) {
            DB::table('results')
                ->where('childID', \Auth::user()->currentChild)
                ->update(['RStimeNSD' => 2]);
        } // check if child slept less than 9 hours
        elseif ($sleepNSD < date('H:i', strtotime('09:00'))) {
            DB::table('results')
                ->where('childID', \Auth::user()->currentChild)
                ->update(['RStimeNSD' => 1]);
        } else {
            DB::table('results')
                ->where('childID', \Auth::user()->currentChild)
                ->update(['RStimeNSD' => 0]);
        }
    }

    public function calculateBmi(Request $request)
    {
        $height = DB::table('entries')
            ->where('childID', \Auth::user()->currentChild)
            ->value('height');

        $weight = DB::table('entries')
            ->where('childID', \Auth::user()->currentChild)
            ->value('weight');
        //convert height in meters
        $heightinm = $height / 100;
        // calculate BMI
        $BMI = $weight / (pow($heightinm, 2));
        //   $BmI=round($BmI ,2);
        //get sex
        $sex = DB::table('child')
            ->where('childID', \Auth::user()->currentChild)
            ->value('sex');
        //convert sex in numbers
        if ($sex == "Male") {
            $sex = 1;
        } else {
            $sex = 2;
        }
        //get date of birth of child
        $dobd = DB::table('child')
            ->where('childID', \Auth::user()->currentChild)
            ->value('DOB');
        //calculate age in days 
        $dob = Carbon::parse($dobd)->diffInDays();
        $calageinmo = 365 / 12;
        $ageinmo = $dob / $calageinmo;
        //  ^^calculate age in monthes

        $agerounded = round($ageinmo);
        // round age 
        //enter value of Rounded age ib tables
        DB::table('child')
            ->where('childID', \Auth::user()->currentChild)
            ->update(['ageinmo' => $agerounded]);
        //get L,M,S values to calculate z-scores 
        $l = DB::table('z_values')
            ->where('sex', '=', $sex)
            ->where('age', '=', $agerounded)
            ->value('l');
        $m = DB::table('z_values')
            ->where('sex', '=', $sex)
            ->where('age', '=', $agerounded)
            ->value('m');
        $s = DB::table('z_values')
            ->where('sex', '=', $sex)
            ->where('age', '=', $agerounded)
            ->value('s');
        //calculate z score form BMI 
        $zBMI = ((pow(($BMI / $m), $l)) - 1) / ($s * $l);                                          //BMI formula
        // enter values of calcuated z-score of BMI
        // see if the child is in the heaalthy range
        if ($zBMI > 3) {
            $sd3pos = $m * (pow((1 + $l * $s * 3), (1 / $l)));
            $sd2pos = $m * (pow((1 + $l * $s * 2), (1 / $l)));
            $sd23pos = $sd3pos - $sd2pos;
            $zBMI = 3 + (($BMI - $sd3pos) / $sd23pos);
            //if z score less than -3
        } elseif ($zBMI < -3) {
            $sd2ng = $m * (pow((1 + $l * $s * (-2)), (1 / $l)));
            $sd3neg = $m * (pow((1 + $l * $s * (-3)), (1 / $l)));
            $sd23neg = $sd2neg - $sd3neg;
            $zBMI = (-3) + (($BMI - $sd2neg) / $sd23neg);
            //if z score more than 3
        } else {
            $zBMI = $zBMI;
            //if z score is between -3 and 3
        }
        DB::table('entries')
            ->where('childID', \Auth::user()->currentChild)
            ->update(['BMI_v' => $zBMI]);

        if ($zBMI < -2) {
            $BMIr = '1'; //underweight
        } elseif ($zBMI >= -1.99 && $zBMI <= 0.99) {
            $BMIr = '0';  //normal weight
        } else {
            $BMIr = '2';  //overweight
        }

        //store child health result in Datatbse
        DB::table('results')
            ->where('childID', \Auth::user()
                ->currentChild)
            ->update(['RBmi' => $BMIr]);

        return view('Weight4', compact('zBMI'));

    }
        
     //Store Mental Health Score
     public function storeMentalHealth(Request $request)
     {
         // Validating Input
         $this->validate($request, [
             'array' => 'required|0-30'
         ]);
 
         // Retrieve input
         $MentalScore = $request->input('array');
 
         // Store in 'Results' table
         DB::table('results')
             ->where('childID', \Auth::user()->currentChild)
             ->update(['MentalScore' => $MentalScore]);
 
         $this->calculateMentalScore($MentalScore);
 
         return redirect('/MentalHeath20');
     }
    }

     
