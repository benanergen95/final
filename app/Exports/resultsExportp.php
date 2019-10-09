<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class resultsExportp implements FromCollection, WithHeadings
{
    public function collection()                    // export parents table to excel in a single sheet
    {

        return \DB::table('users')
            ->join('child', 'users.id', '=', 'child.parentID')
            ->join('entries', 'users.currentChild', '=', 'entries.childID')
            ->join('results', 'users.currentChild', '=', 'results.resultID')
            ->orderBy('users.id', 'ASC')
            ->select('users.id', 'users.fname', 'users.lname', 'users.pType', 'users.email', 'users.currentChild',
                'child.CfName AS cfname', 'child.ClName')->get(); //tablename
    }

    public function headings(): array
    {
        return array('Parent ID', 'Parent Firstname', 'Parent Lastname', 'Parent Type', 'Email ID', 'Assosicated child ID', 'Child Firstname', 'Child Lastname'
        );
    }
}