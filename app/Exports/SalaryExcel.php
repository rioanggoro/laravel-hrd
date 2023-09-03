<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use DB;
use Carbon\Carbon;
use Session;

class SalaryExcel implements FromView
{
    public $text;
    function __construct($text) {
        $this->text = $text;
    }
    public function view():View
    {
        $text =  $this->text;
        return view('report_template.salary_excel', compact('result'));
    }
}