<?php

namespace App\Http\Controllers;

use App\Models\Foods;
use Illuminate\Http\Request;

class FoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods = Foods::all();
        return view('admin.foods.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.foods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:15',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|file|max:5120',
        ]);

        $image = $request->file('image');
        $imageName = '/images/foods/' . time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/foods'), $imageName);

        Foods::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => number_format((float) $request->price, 3, '.', ''), 
            'image' => $imageName,
        ]);

        return redirect()->route('foods.index')->with('success', 'Food Created Successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Foods $food)
    {
        return view('admin.foods.show', compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $food = Foods::findOrFail($id);
        return view('admin.foods.edit', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foods $food)
    {
        $food->delete();
        return redirect()->route('foods.index')->with('success', 'Food Deleted Successfully!');
    }
}
