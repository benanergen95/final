<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class resultsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()                        // export all tables to excel in a single sheet
    {

        return \DB::table('users')->join('child', 'child.parentID', '=', 'users.id')
            ->join('entries', 'child.ChildID', '=', 'entries.childID')
            ->join('results', 'child.ChildID', '=', 'results.childID')
            ->orderBy('users.id', 'ASC')
            ->select('users.id', 'users.fname', 'users.lname', 'users.pType', 'users.email', 'child.childID',
                'child.CfName AS cfname', 'child.ClName', 'child.sex', 'child.DOB', 'child.age', 'child.ageinmo',
                'entries.height', 'entries.weight', 'entries.waist', 'entries.WHR_v', 'entries.BMI_v', 'entries.fruits', 'entries.veggies', 'entries.exercise', 'entries.screenTimeSD',
                'entries.screenTimeNSD', 'entries.sleepSD', 'entries.sleepNSD',
                'results.Rwhr', 'results.RBmi', 'results.RfruitsIntake', 'results.RveggiesIntake', 'results.Rexercise', 'results.RscreentimeSD', 'results.RscreentimeNSD',
                'results.RStimeSD', 'results.RStimeNSD')->get(); //tablename
    }

    public function map($all): array
    {
        return [

            $all->id,
            $all->fname,
            $all->lname,
            $all->pType,
            $all->email,
            $all->childID,
            $all->cfname,
            $all->ClName,
            $all->sex,
            $all->DOB,
            $all->age,
            $all->ageinmo,
            $all->height,   //Height
            $all->weight,   //Weight
            $all->waist,   //Waist circum.
            $all->WHR_v === null ? '' : sprintf("%f", $all->WHR_v),   //Waist hip ratio value
            $all->BMI_v === null ? '' : sprintf("%f", $all->BMI_v),   //Bmi value
            $all->fruits === null && $all->fruits !== 0 ? ' ' : sprintf("%f", $all->fruits), //fruits
            $all->veggies === null && $all->veggies !== 0 ? ' ' : sprintf("%f", $all->veggies), //veggies
            $all->exercise === null ? '' : sprintf($all->exercise),//exercise
            $all->screenTimeSD === null && $all->screenTimeSD !== 0 ? ' ' : sprintf("%f", $all->screenTimeSD),//screen time school days
            $all->screenTimeNSD === null && $all->screenTimeNSD !== 0 ? ' ' : sprintf("%f", $all->screenTimeNSD),//screen time non school days
            $all->exercise === null ? '' : sprintf($all->sleepSD),//sleep time school days
            $all->exercise === null ? '' : sprintf($all->sleepNSD),//sleep time non school days
            $all->Rwhr === null ? '' : sprintf("%d", $all->Rwhr),
            $all->RBmi === null ? '' : sprintf("%d", $all->RBmi),
            $all->RfruitsIntake === null ? '' : sprintf("%d", $all->RfruitsIntake),
            $all->RveggiesIntake === null ? '' : sprintf("%d", $all->RveggiesIntake),
            $all->Rexercise === null ? '' : sprintf("%d", $all->Rexercise),
            $all->RscreentimeSD === null ? '' : sprintf("%d", $all->RscreentimeSD),
            $all->RscreentimeNSD === null ? '' : sprintf("%d", $all->RscreentimeNSD),
            $all->RStimeSD === null ? '' : sprintf("%d", $all->RStimeSD),
            $all->RStimeNSD === null ? '' : sprintf("%d", $all->RStimeNSD)
        ];
    }

    public function headings(): array
    {
        return array('Parent ID', 'Parent Firstname', 'Parent Lastname', 'Parent Type', 'Email ID', 'Child ID',   //6
            'Child Firstname', 'Child Lastname', 'Sex', 'Date of Birth', 'Age', 'Age in Months',                       //12
            'Height in cms', 'Weight in kgs', 'Waist in cms', 'Waist height ratio', 'BMI z-scores', 'Fruits',   //18
            'Veggies', 'Exercise', 'Screentime school days', 'Screentime non-school days', 'Sleeptime School days', 'Sleeptime non-school days',  //24
            'Result WHR', 'Result BMI', 'Result Fruits Intake', 'Result veggies intake', 'Result exercise', 'Result screentime School days',       //30
            'Result screentime non School days', 'Result sleep School days', 'Result sleep nonschool days'                                      //33

        );
    }
}