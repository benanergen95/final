<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Exports\resultsExport;
use App\Exports\resultsExportp;
use App\Exports\resultsExportc;
use App\Exports\resultsExporte;
use App\Exports\resultsExportr;
use Illuminate\Http\Request;
use DB;

class ExportExcelController extends Controller
{
    function excel()
    {
        return Excel::download(new resultsExport, 'invoices.xlsx');                                     //export all tables to excel
    }

    function excel2()
    {
        return Excel::download(new resultsExportp, 'Parent.xlsx');                                      //export parents table to excel
    }

    function excel3()
    {
        return Excel::download(new resultsExportc, 'Child.xlsx');                                  //export child table to excel
    }

    function excel4()
    {
        return Excel::download(new resultsExporte, 'Entries.xlsx');                              //export entries table to excel
    }

    function excel5()
    {
        return Excel::download(new resultsExportr, 'Results.xlsx');                             // export results table to excel
    }
}

?>
