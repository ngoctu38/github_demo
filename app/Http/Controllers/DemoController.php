<?php


namespace App\Http\Controllers;


use App\Models\Demo;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function index()
    {
        $demo = Demo::latest()->paginate(10);

        return view('demos.index', compact('demo'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function create()
    {
        return view('demos.create');
    }

    public function store(Request $request)
    {
        $demo = Demo::all();
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
        Demo::create($request->all());

        return redirect()->route('demos.index')
            ->with('success', 'Product created successfully.');
    }
}
