<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class resultsExportr implements FromCollection, WithHeadings, WithMapping
{
    public function collection()        // export results table to excel in a single sheet
    {

        return \DB::table('users')
            ->join('child', 'child.parentID', '=', 'users.id')
            ->join('entries', 'child.ChildID', '=', 'entries.childID')
            ->join('results', 'child.ChildID', '=', 'results.childID')
            ->orderBy('users.id', 'ASC')
            ->select('users.id', 'child.childID', 'users.email',
                'child.CfName AS cfname', 'child.ClName', 'results.Rwhr', 'results.RBmi', 'results.RfruitsIntake', 'results.RveggiesIntake', 'results.Rexercise',
                'results.RscreentimeSD', 'results.RscreentimeNSD',
                'results.RStimeSD', 'results.RStimeNSD')->get(); //tablename
    }


    public function map($result): array
    {
        return [
            $result->id,
            $result->childID,
            $result->email,
            $result->cfname,
            $result->ClName,
            $result->Rwhr === null ? '' : sprintf("%d", $result->Rwhr),
            $result->RBmi === null ? '' : sprintf("%d", $result->RBmi),
            $result->RfruitsIntake === null ? '' : sprintf("%d", $result->RfruitsIntake),
            $result->RveggiesIntake === null ? '' : sprintf("%d", $result->RveggiesIntake),
            $result->Rexercise === null ? '' : sprintf("%d", $result->Rexercise),
            $result->RscreentimeSD === null ? '' : sprintf("%d", $result->RscreentimeSD),
            $result->RscreentimeNSD === null ? '' : sprintf("%d", $result->RscreentimeNSD),
            $result->RStimeSD === null ? '' : sprintf("%d", $result->RStimeSD),
            $result->RStimeNSD === null ? '' : sprintf("%d", $result->RStimeNSD)
        ];
    }


    public function headings(): array
    {
        return array(
            'Parent ID', 'Child ID', 'Email ID', 'Child Firstname', 'Child Lastname', 'Result WHR', 'Result BMI', 'Result Fruits Intake', 'Result veggies intake',
            'Result exercise', 'Result screentime School days', 'Result screentime non School days', 'Result sleep School days', 'Result sleep nonschool days'

        );
    }
}