<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;

class SalaryExcel implements FromView
{
    // public $users;
    // function __construct($users) {
    //     $this->users = $users;
    // }
    public function view():View
    {
        // $user s =  $this->users;
        return view('report_template.salary_excel',);
    }
}
