<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

class SummernoteController extends Controller
{
    public function index()
    {
        return view('AdminWhyuse');
    }


    public function editwhyusefunction(Request $request)

    {
        $whyuseedit = $request->input('editwhyusevalue');
        DB::table('summernotes')
            ->where("item_id", "=", 1)
            ->update(['content' => $whyuseedit]);                               //get and store whyuse page text 

        $whyuseedit1 = $request->input('editwhyusemsgvalue');                   ////get and store whyuse page message text 
        DB::table('summernotes')
            ->where("item_id", "=", 77)
            ->update(['content' => $whyuseedit1]);
        return back();

    }

    public function editweight0function(Request $request)

    {
        $adddata = $request->input('editweight0value');                    //get and store weight0  page text 
        DB::table('summernotes')
            ->where("item_id", "=", 2)
            ->update(['content' => $adddata]);
        return back();

    }

    public function editweight1function(Request $request)

    {
        $adddata = $request->input('editweight1value');                        //get and store weight1  page text 
        DB::table('summernotes')
            ->where("item_id", "=", 3)
            ->update(['content' => $adddata]);
        return back();

    }

    public function editweight2function(Request $request)                            //get and store weight2  page text

    {
        $adddata = $request->input('editweight2value');
        DB::table('summernotes')
            ->where("item_id", "=", 4)
            ->update(['content' => $adddata]);
        return back();
    }

    public function editweight3function(Request $request)

    {
        $adddata = $request->input('editweight3value');                                      //get and store weight3  page text 
        DB::table('summernotes')
            ->where("item_id", "=", 5)
            ->update(['content' => $adddata]);
        return back();
    }

    public function editweight4function(Request $request)                           //get and store weight4  page text

    {
        $adddata = $request->input('editweight4value');
        DB::table('summernotes')
            ->where("item_id", "=", 6)
            ->update(['content' => $adddata]);
        return back();
    }

    public function editdiet0function(Request $request)

    {
        $adddata = $request->input('editdiet0value');                                //get and store diet 0  page text 
        DB::table('summernotes')
            ->where("item_id", "=", 7)
            ->update(['content' => $adddata]);
        return back();
    }

    public function editdiet1function(Request $request)                      //get and store diet 1  page text
    {
        $adddata = $request->input('editdiet1value');
        DB::table('summernotes')
            ->where("item_id", "=", 8)
            ->update(['content' => $adddata]);
        return back();
    }

    public function editdiet2function(Request $request)                   //get and store diet 2  page text
    {
        $adddata = $request->input('editdiet2value');
        DB::table('summernotes')
            ->where("item_id", "=", 9)
            ->update(['content' => $adddata]);
        return back();
    }

    public function editdiet4function(Request $request)                 //get and store diet 3  page text
    {
        $adddata = $request->input('d1');
        DB::table('summernotes')
            ->where("item_id", "=", 44)
            ->update(['content' => $adddata]);
        $adddata1 = $request->input('d2');
        DB::table('summernotes')
            ->where("item_id", "=", 45)
            ->update(['content' => $adddata1]);
        $adddata2 = $request->input('d3');
        DB::table('summernotes')
            ->where("item_id", "=", 46)
            ->update(['content' => $adddata2]);
        $adddata4 = $request->input('d4');
        DB::table('summernotes')
            ->where("item_id", "=", 47)
            ->update(['content' => $adddata4]);
        $adddata5 = $request->input('d5');
        DB::table('summernotes')
            ->where("item_id", "=", 48)
            ->update(['content' => $adddata5]);

        return back();
    }

    public function editdiet3function(Request $request)             //get and store diet 4  page text
    {
        $adddata = $request->input('linkd1');
        DB::table('summernotes')
            ->where("item_id", "=", 29)
            ->update(['content' => $adddata]);
        $adddata1 = $request->input('linkd2');
        DB::table('summernotes')
            ->where("item_id", "=", 30)
            ->update(['content' => $adddata1]);
        $adddata2 = $request->input('linkd3');
        DB::table('summernotes')
            ->where("item_id", "=", 31)
            ->update(['content' => $adddata2]);
        $adddata3 = $request->input('diamge');
        DB::table('summernotes')
            ->where("item_id", "=", 50)
            ->update(['content' => $adddata3]);
        return back();

    }

    public function editexercise0function(Request $request)        //get and store exercise 0  page text
    {
        $adddata = $request->input('editexercise0value');
        DB::table('summernotes')
            ->where("item_id", "=", 10)
            ->update(['content' => $adddata]);
        return back();
    }

    public function editexercise1function(Request $request)         //get and store exercise 1  page text
    {
        $adddata = $request->input('editexercise1value');
        DB::table('summernotes')
            ->where("item_id", "=", 11)
            ->update(['content' => $adddata]);
        return back();
    }

    public function editexercise11function(Request $request)                    //get and store exercise 1 2nd text page
    {
        $adddata = $request->input('editexercise11value');
        DB::table('summernotes')
            ->where("item_id", "=", 18)
            ->update(['content' => $adddata]);
        return back();
    }

    public function editexercise3function(Request $request)            //get and store exercise 2  page text
    {
        $adddata = $request->input('e31');
        DB::table('summernotes')
            ->where("item_id", "=", 52)
            ->update(['content' => $adddata]);
        $adddata1 = $request->input('e32');
        DB::table('summernotes')
            ->where("item_id", "=", 53)
            ->update(['content' => $adddata1]);
        $adddata2 = $request->input('e33');
        DB::table('summernotes')
            ->where("item_id", "=", 54)
            ->update(['content' => $adddata2]);
        $adddata3 = $request->input('e34');
        DB::table('summernotes')
            ->where("item_id", "=", 55)
            ->update(['content' => $adddata3]);
        $adddata4 = $request->input('e35');
        DB::table('summernotes')
            ->where("item_id", "=", 56)
            ->update(['content' => $adddata4]);
        return back();
    }


    public function editexercise2function(Request $request)        //get and store exercise 3  page text
    {
        $adddata = $request->input('linke1');
        DB::table('summernotes')
            ->where("item_id", "=", 32)
            ->update(['content' => $adddata]);
        $adddata1 = $request->input('linke2');
        DB::table('summernotes')
            ->where("item_id", "=", 33)
            ->update(['content' => $adddata1]);
        $adddata2 = $request->input('linke3');
        DB::table('summernotes')
            ->where("item_id", "=", 34)
            ->update(['content' => $adddata2]);
        $adddata3 = $request->input('e5');
        DB::table('summernotes')
            ->where("item_id", "=", 51)
            ->update(['content' => $adddata3]);
        return back();
    }

    public function editmental0function(Request $request)    //get and store mentalhealth 0 page text
    {
        $adddata = $request->input('editmental0value');
        DB::table('summernotes')
            ->where("item_id", "=", 79)
            ->update(['content' => $adddata]);
        return back();
    }

    public function editmental1function(Request $request)    //get and store mentalhealth 0 page text
    {
        $adddata = $request->input('editmental1value');
        DB::table('summernotes')
            ->where("item_id", "=", 80)
            ->update(['content' => $adddata]);
        return back();
    }

    public function editmental2function(Request $request)    //get and store mentalhealth 0 page text
    {
        $adddata = $request->input('editmental2value');
        DB::table('summernotes')
            ->where("item_id", "=", 81)
            ->update(['content' => $adddata]);
        return back();
    }

    public function editscreentime0function(Request $request)    //get and store screentime 0 page text
    {
        $adddata = $request->input('editscreentime0value');
        DB::table('summernotes')
            ->where("item_id", "=", 12)
            ->update(['content' => $adddata]);
        return back();
    }

    public function editscreentime1function(Request $request)    //get and store screentime 1 page text
    {
        $adddata = $request->input('editscreentime1value');
        DB::table('summernotes')
            ->where("item_id", "=", 13)
            ->update(['content' => $adddata]);
        return back();
    }

    public function editscreentime2function(Request $request)    //get and store screentime 2 page text
    {
        $adddata = $request->input('editscreentime2value');
        DB::table('summernotes')
            ->where("item_id", "=", 14)
            ->update(['content' => $adddata]);
        return back();
    }

    public function editscreentime21function(Request $request)  //get and store screentime 2 2nd page text
    {
        $adddata = $request->input('editscreentime21value');
        DB::table('summernotes')
            ->where("item_id", "=", 15)
            ->update(['content' => $adddata]);
        return back();
    }

    public function editscreentime3function(Request $request)         //get and store screentime 3 page text
    {
        $adddata = $request->input('editscreentime3value');
        DB::table('summernotes')
            ->where("item_id", "=", 16)
            ->update(['content' => $adddata]);
        return back();
    }

    public function editscreentime5function(Request $request)     //get and store screentime 4 page text
    {
        $adddata = $request->input('st1');
        DB::table('summernotes')
            ->where("item_id", "=", 58)
            ->update(['content' => $adddata]);
        $adddata1 = $request->input('st2');
        DB::table('summernotes')
            ->where("item_id", "=", 59)
            ->update(['content' => $adddata1]);
        $adddata2 = $request->input('st3');
        DB::table('summernotes')
            ->where("item_id", "=", 60)
            ->update(['content' => $adddata2]);
        $adddata3 = $request->input('st4');
        DB::table('summernotes')
            ->where("item_id", "=", 61)
            ->update(['content' => $adddata3]);
        $adddata4 = $request->input('st5');
        DB::table('summernotes')
            ->where("item_id", "=", 62)
            ->update(['content' => $adddata4]);
        return back();
    }

    public function editscreentime4function(Request $request)     //get and store screentime 5 page text
    {
        $adddata = $request->input('linkst1');
        DB::table('summernotes')
            ->where("item_id", "=", 35)
            ->update(['content' => $adddata]);
        $adddata1 = $request->input('linkst2');
        DB::table('summernotes')
            ->where("item_id", "=", 36)
            ->update(['content' => $adddata1]);
        $adddata2 = $request->input('linkst3');
        DB::table('summernotes')
            ->where("item_id", "=", 37)
            ->update(['content' => $adddata2]);
        $adddata2 = $request->input('st5');
        DB::table('summernotes')
            ->where("item_id", "=", 57)
            ->update(['content' => $adddata2]);
        return back();
    }


    public function editsleep0function(Request $request)               //get and store sleep 0 page text
    {
        $adddata = $request->input('editsleep0value');
        DB::table('summernotes')
            ->where("item_id", "=", 17)
            ->update(['content' => $adddata]);
        return back();
    }

    public function editsleep1function(Request $request)            //get and store sleep 4 page text
    {
        $adddata = $request->input('linksl1');
        DB::table('summernotes')
            ->where("item_id", "=", 38)
            ->update(['content' => $adddata]);
        $adddata1 = $request->input('linksl2');
        DB::table('summernotes')
            ->where("item_id", "=", 39)
            ->update(['content' => $adddata1]);
        $adddata2 = $request->input('linksl3');
        DB::table('summernotes')
            ->where("item_id", "=", 40)
            ->update(['content' => $adddata2]);
        $adddata3 = $request->input('slp1');
        DB::table('summernotes')
            ->where("item_id", "=", 63)
            ->update(['content' => $adddata3]);
        return back();
    }

    public function editsleep2function(Request $request)                    //get and store sleep 3 page text
    {
        $adddata = $request->input('eslp1');
        DB::table('summernotes')
            ->where("item_id", "=", 64)
            ->update(['content' => $adddata]);
        $adddata1 = $request->input('eslp2');
        DB::table('summernotes')
            ->where("item_id", "=", 65)
            ->update(['content' => $adddata1]);
        $adddata2 = $request->input('eslp3');
        DB::table('summernotes')
            ->where("item_id", "=", 66)
            ->update(['content' => $adddata2]);
        $adddata3 = $request->input('eslp4');
        DB::table('summernotes')
            ->where("item_id", "=", 67)
            ->update(['content' => $adddata3]);
        $adddata4 = $request->input('eslp5');
        DB::table('summernotes')
            ->where("item_id", "=", 68)
            ->update(['content' => $adddata4]);
        $adddata5 = $request->input('eslp6');
        DB::table('summernotes')
            ->where("item_id", "=", 69)
            ->update(['content' => $adddata5]);
        $adddata6 = $request->input('eslp7');
        DB::table('summernotes')
            ->where("item_id", "=", 70)
            ->update(['content' => $adddata6]);
        return back();
    }

    public function editsleep3function(Request $request)    //get and store sleep 1 page text
    {
        $adddata = $request->input('eslp31');
        DB::table('summernotes')
            ->where("item_id", "=", 71)
            ->update(['content' => $adddata]);
        $adddata1 = $request->input('eslp32');
        DB::table('summernotes')
            ->where("item_id", "=", 72)
            ->update(['content' => $adddata1]);
        $adddata2 = $request->input('eslp33');
        DB::table('summernotes')
            ->where("item_id", "=", 73)
            ->update(['content' => $adddata2]);
        return back();
    }

    public function editsleep4function(Request $request)    //get and store sleep 2 page text
    {
        $adddata = $request->input('eslp41');
        DB::table('summernotes')
            ->where("item_id", "=", 74)
            ->update(['content' => $adddata]);
        $adddata1 = $request->input('eslp42');
        DB::table('summernotes')
            ->where("item_id", "=", 75)
            ->update(['content' => $adddata1]);
        $adddata2 = $request->input('eslp43');
        DB::table('summernotes')
            ->where("item_id", "=", 76)
            ->update(['content' => $adddata2]);
        return back();
    }

    public function editweight5function(Request $request)       //edit weight result output messages stored in DB
    {
        $adddata1 = $request->input('main');
        DB::table('summernotes')
            ->where("item_id", "=", 19)
            ->update(['content' => $adddata1]);


        $adddata2 = $request->input('ifnorf');
        DB::table('summernotes')
            ->where("item_id", "=", 20)
            ->update(['content' => $adddata2]);


        $adddata3 = $request->input('ifnotl');
        DB::table('summernotes')
            ->where("item_id", "=", 21)
            ->update(['content' => $adddata3]);


        $adddata4 = $request->input('ifwnf');
        DB::table('summernotes')
            ->where("item_id", "=", 22)
            ->update(['content' => $adddata4]);


        $adddata5 = $request->input('ifwnl');
        DB::table('summernotes')
            ->where("item_id", "=", 23)
            ->update(['content' => $adddata5]);


        $adddata6 = $request->input('ifovf');
        DB::table('summernotes')
            ->where("item_id", "=", 24)
            ->update(['content' => $adddata6]);


        $adddata7 = $request->input('ifovl');
        DB::table('summernotes')
            ->where("item_id", "=", 25)
            ->update(['content' => $adddata7]);
        $adddata8 = $request->input('imggood');
        DB::table('summernotes')
            ->where("item_id", "=", 42)
            ->update(['content' => $adddata8]);

        $adddata9 = $request->input('imgngood');
        DB::table('summernotes')
            ->where("item_id", "=", 43)
            ->update(['content' => $adddata9]);
        return back();
    }

    public function editweight6function(Request $request)  //weight page text values
    {
        $adddata1 = $request->input('link1');
        DB::table('summernotes')
            ->where("item_id", "=", 26)
            ->update(['content' => $adddata1]);


        $adddata2 = $request->input('link2');
        DB::table('summernotes')
            ->where("item_id", "=", 27)
            ->update(['content' => $adddata2]);


        $adddata3 = $request->input('link3');
        DB::table('summernotes')
            ->where("item_id", "=", 28)
            ->update(['content' => $adddata3]);

        $adddata4 = $request->input('link4');
        DB::table('summernotes')
            ->where("item_id", "=", 41)
            ->update(['content' => $adddata4]);
        return back();
    }
}
