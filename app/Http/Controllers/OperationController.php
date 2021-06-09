<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operation = Operation::latest()->paginate(10);

        return view('operations.hh',compact('operation'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $operation = Operation::all();
        $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);
        $image = Storage::putFile('public/images',$request->image);


        Operation::create($request->all());


        return   redirect()->route('operations.index')
            ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Operation $operation)
    {
        return view('operations.show',compact('operation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Operation $operation)
    {
        return view('products.edit',compact('operation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operation $operation  , $image)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);



        $operation->update($request->all());

        return redirect()->route('operations.index')
            ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *git ini
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operation $operation)
    {
        $operation->delete();

        return redirect()->route('operations.index')
            ->with('success','Product deleted successfully');
    }
  public function demo()
    {
        return view('operations.create');
    } 
  public function demo1()
    {
        return view('operations.create');
    } 

}
