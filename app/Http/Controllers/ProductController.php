<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Exports\ExcelImports;
use App\Exports\ExcelExports;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);

        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public  function  export(){
        return Product::download(new ExcelExports ,'product.txt' );
}
public function import( Request  $request){
        $path = $request -> file('file') ->getRealPath();
        Product::import(new ExcelImports , $path);

        return back() ;
}
    public function importExcel(Request $request)
    {
        if ( $path = $request -> file('file')->getRealPath()) {
            return back()->with('success','No file selected');
        }
        else {
            $path = $request ->file('file')->getRealPath();
            $inserts = [];
            Excel::load($path,function($reader) use (&$inserts)
            {
                foreach ($reader->toArray() as $rows){
                    foreach($rows as $row){
                        $inserts[] = ['name' => $row['name'], 'detail' => $row['detail']];
                    }
                }
            });

            if (!empty($inserts)) {
                DB::table('products')->insert($inserts);
                return back()->with('success','Inserted Record successfully');
            }


            return back();
        }

    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request)
//    {
//        $request->validate([
//            'name' => 'required',
//            'detail' => 'required',
//        ]);
//
//        Product::create($request->all());
//
//        return redirect()->route('products.index')
//            ->with('success','Product created successfully.');
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param  \App\Product  $product
//     * @return \Illuminate\Http\Response
//     */
//    public function show(Product $product)
//    {
//        return view('products.show',compact('product'));
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  \App\Product  $product
//     * @return \Illuminate\Http\Response
//     */
//    public function edit(Product $product)
//    {
//        return view('products.edit',compact('product'));
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  \App\Product  $product
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, Product $product)
//    {
//        $request->validate([
//            'name' => 'required',
//            'detail' => 'required',
//        ]);
//
//        $product->update($request->all());
//
//        return redirect()->route('products.index')
//            ->with('success','Product updated successfully');
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  \App\Product  $product
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy(Product $product)
//    {
//        $product->delete();
//
//        return redirect()->route('products.index')
//            ->with('success','Product deleted successfully');
//    }
}
