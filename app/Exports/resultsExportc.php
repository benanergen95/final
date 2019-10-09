<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class resultsExportc implements FromCollection, WithHeadings
{
    public function collection()      // export chid table to excel in a single sheet
    {

        return \DB::table('users')
            ->join('child', 'users.id', '=', 'child.parentID')
            ->join('entries', 'users.currentChild', '=', 'entries.childID')
            ->join('results', 'users.currentChild', '=', 'results.resultID')
            ->orderBy('users.id', 'ASC')
            ->select('users.id', 'users.currentChild', 'users.email',
                'child.CfName AS cfname', 'child.ClName', 'child.sex', 'child.DOB', 'child.age', 'child.ageinmo')->get(); //tablename
    }

    public function headings(): array
    {
        return array('parentID', 'Child ID', 'Email ID', 'Child Firstname', 'Child Lastname', 'Sex', 'Date of Birth', 'Age', 'Age in Months');
    }
}