<?php

namespace App\Exports;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

class CsvExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $total_amount = DB::select("select SUM(total_amount) from sale");
        $result = DB::select("select* from sale");
        $result1 = DB::select("select* from customer");
        return view('admin.pdf_sale_by_customer',compact('result','total_amount','result1'));
    }
}
