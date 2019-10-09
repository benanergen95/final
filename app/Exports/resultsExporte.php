<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class resultsExporte implements FromCollection, WithHeadings, WithMapping
{
    public function collection()                    // export entries table to excel in a single sheet
    {

        return \DB::table('users')
            ->join('child', 'child.parentID', '=', 'users.id')
            ->join('entries', 'child.ChildID', '=', 'entries.childID')
            ->join('results', 'child.ChildID', '=', 'results.childID')
            ->orderBy('users.id', 'ASC')
            ->select('users.id', 'child.childID', 'users.email',
                'child.CfName AS cfname', 'child.ClName', 'child.sex', 'child.ageinmo',
                'entries.height', 'entries.weight', 'entries.waist', 'entries.WHR_v', 'entries.BMI_v', 'entries.fruits', 'entries.veggies', 'entries.exercise', 'entries.screenTimeSD',
                'entries.screenTimeNSD', 'entries.sleepSD', 'entries.sleepNSD')->get(); //tablename
    }

    public function map($entries): array
    {

        return [
            $entries->id, //parent id
            $entries->childID, //child id
            $entries->email, //email
            $entries->cfname, //first name
            $entries->ClName, //last name
            $entries->sex,   //sex
            $entries->ageinmo,   //Age in months
            $entries->height,   //Height
            $entries->weight,   //Weight
            $entries->waist,   //Waist circum.
            $entries->WHR_v === null ? '' : sprintf("%f", $entries->WHR_v),   //Waist hip ratio value
            $entries->BMI_v === null ? '' : sprintf("%f", $entries->BMI_v),   //Bmi value
            $entries->fruits === null && $entries->fruits !== 0 ? ' ' : sprintf("%f", $entries->fruits), //fruits
            $entries->veggies === null && $entries->veggies !== 0 ? ' ' : sprintf("%f", $entries->veggies), //veggies
            $entries->exercise === null ? '' : sprintf($entries->exercise),//exercise
            $entries->screenTimeSD === null && $entries->screenTimeSD !== 0 ? ' ' : sprintf("%f", $entries->screenTimeSD),//screen time school days
            $entries->screenTimeNSD === null && $entries->screenTimeNSD !== 0 ? ' ' : sprintf("%f", $entries->screenTimeNSD),//screen time non school days
            $entries->exercise === null ? '' : sprintf($entries->sleepSD),//sleep time school days
            $entries->exercise === null ? '' : sprintf($entries->sleepNSD),//sleep time non school days
        ];
    }

    public function headings(): array
    {
        return array('parentID', 'Child ID', 'Email', 'Firstname', 'Lastname', ' Sex', 'Age in Months', 'Height(cm)', 'Weight(kg)', 'waist circumference(cm)', 'W/H Ratio', 'BMI z_score', 'Fruits', 'Veggies', 'Exercise', 'ScreenTime School Days', 'ScreenTime non-chool Days', 'Sleep School Days', 'Sleep non-school Days');
    }
}

