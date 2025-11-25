<?php

namespace App\Http\Controllers;
use App\Models\Zoo;

use Illuminate\Http\Request;

class ZooController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    // Display all zoos
    public function index()
    {
        $zoos = Zoo::all();
        return view('zoos.index', compact('zoos'));
    }

    /**
     * Show the form for creating a new resource.
     */
   // Show form to create a new zoo
    public function create()
    {
        return view('zoos.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    // Store new zoo in database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'size' => 'required',
            'location' => 'required',
        ]);

        zoo::create($request->only(['name', 'size', 'location']));

        return redirect()->route('zoos.index')->with('success', 'zoo added successfully!');
    }

    /**
     * Display the specified resource.
     */
     // Show a specific zoo 
    public function show(Zoo $zoo)
    {
        return view('zoos.show', compact('zoo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Show form to edit an zoo 
    public function edit(Zoo $zoo)
    {
        return view('zoos.edit', compact('zoo'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Update an existing zoo 
    public function update(Request $request, Zoo $zoo)
    {
        $request->validate([
            'name' => 'required',
            'size' => 'required',
            'location' => 'required',
        ]);

        $zoo->update($request->only(['name', 'size', 'location']));

        return redirect()->route('zoos.index')->with('success', 'zoo updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    // Delete an zoo (for future use)
    public function destroy(Zoo $zoo)
    {
        $zoo->delete();
        return redirect()->route('zoos.index')->with('success', 'zoo deleted successfully!');
    }
}
