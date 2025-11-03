<?php

namespace App\Http\Controllers;
use App\Models\Animal;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Display all animals
    public function index()
    {
        $animals = Animal::all();
        return view('animals.index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     */
   // Show form to create a new animal
    public function create()
    {
        return view('animals.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    // Store new animal in database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'species' => 'required',
        ]);

        Animal::create($request->only(['name', 'species']));

        return redirect()->route('animals.index')->with('success', 'Animal added successfully!');
    }

    /**
     * Display the specified resource.
     */
     // Show a specific animal 
    public function show(Animal $animal)
    {
        return view('animals.show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Show form to edit an animal 
    public function edit(Animal $animal)
    {
        return view('animals.edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Update an existing animal 
    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'name' => 'required',
            'species' => 'required',
        ]);

        $animal->update($request->only(['name', 'species']));

        return redirect()->route('animals.index')->with('success', 'Animal updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    // Delete an animal (for future use)
    public function destroy(Animal $animal)
    {
        $animal->delete();
        return redirect()->route('animals.index')->with('success', 'Animal deleted successfully!');
    }
}
