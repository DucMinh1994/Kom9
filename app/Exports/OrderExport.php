<?php

namespace App\Exports;

use App\Order;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrderExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::where(DB::raw("(DATE_FORMAT(created_at,'%m'))"),date('m'))->get();
    }
}
