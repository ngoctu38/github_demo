<?php


namespace App\Exports;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Excel;

class Imports   implements ToModel
{
    public function model( array $row){
        return new Product([
            "name" =>$row[1],
            "detail" => $row[2]
        ]); 
    }
}
