<?php


namespace App\Exports;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelExports   implements FromCollection
{
public function collection(){
    return Product::all();
}
}
