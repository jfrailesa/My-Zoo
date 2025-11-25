<?php

namespace App\Http\Controllers;
use App\Models\Caretaker;

use Illuminate\Http\Request;

class CaretakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Display all Caretakers
    public function index()
    {
        $Caretakers = Caretaker::all();
        return view('caretakers.index', compact('Caretakers'));
    }

    /**
     * Show the form for creating a new resource.
     */
   // Show form to create a new Caretaker
    public function create()
    {
        return view('caretakers.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    // Store new Caretaker in database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'id' => 'required',
            'yearsofexp' => 'required',
        ]);

        Caretaker::create($request->only(['name', 'id', 'yearsofexp']));

        return redirect()->route('caretakers.index')->with('success', 'Caretaker added successfully!');
    }

    /**
     * Display the specified resource.
     */
     // Show a specific Caretaker 
    public function show(Caretaker $Caretaker)
    {
        return view('caretakers.show', compact('Caretaker'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Show form to edit an Caretaker 
    public function edit(Caretaker $Caretaker)
    {
        return view('caretakers.edit', compact('Caretaker'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Update an existing Caretaker 
    public function update(Request $request, Caretaker $Caretaker)
    {
        $request->validate([
            'name' => 'required',
            'id' => 'required',
            'yearsofexp' => 'required',
        ]);

        $Caretaker->update($request->only(['name', 'id', 'yearsofexp']));

        return redirect()->route('caretakers.index')->with('success', 'Caretaker updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    // Delete an Caretaker (for future use)
    public function destroy(Caretaker $Caretaker)
    {
        $Caretaker->delete();
        return redirect()->route('caretakers.index')->with('success', 'Caretaker deleted successfully!');
    }
}
