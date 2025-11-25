<?php

namespace App\Http\Controllers;
use App\Models\Animal;
use App\Models\Zoo;
use App\Models\Caretaker;
use App\Models\MedicalHistory;

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
        $zoos = Zoo::all();
        $caretakers = Caretaker::all();
        $medicalHistories = MedicalHistory::all();

        // Prepare the "selected" values safely (old() takes precedence)
        $selectedZoo = old('zoo_id', $animal->zoo_id);

        $selectedMedicalHistory = old('medical_history_id',
            optional($animal->medicalHistory)->id
        );

        // Ensure we always pass an array for selected caretakers
        $selectedCaretakers = old('caretaker_ids',
            $animal->caretakers ? $animal->caretakers->pluck('id')->toArray() : []
        );

        return view('animals.edit', compact(
            'animal',
            'zoos',
            'caretakers',
            'medicalHistories',
            'selectedZoo',
            'selectedMedicalHistory',
            'selectedCaretakers'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    // Update an existing animal 
    public function update(Request $request, Animal $animal)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'zoo_id' => 'nullable|exists:zoos,id',
            'medical_history_id' => 'nullable|exists:medical_histories,id',
            'caretaker_ids' => 'nullable|array',
            'caretaker_ids.*' => 'exists:caretakers,id',
        ]);

        // Update basic fields
        $animal->update([
            'name' => $validated['name'],
            'species' => $validated['species'],
            'zoo_id' => $validated['zoo_id'] ?? null,
        ]);

        // Update medical history (one-to-one)
        if (!empty($validated['medical_history_id'])) {
            $medicalHistory = MedicalHistory::find($validated['medical_history_id']);
            if ($medicalHistory) {
                $medicalHistory->animal_id = $animal->id;
                $medicalHistory->save();
            }
        } else {
            if ($animal->medicalHistory) {
                $animal->medicalHistory->animal_id = null;
                $animal->medicalHistory->save();
            }
        }

        // Sync caretakers (many-to-many)
        $animal->caretakers()->sync($validated['caretaker_ids'] ?? []);

        return redirect()->route('animals.index')->with('success', 'Animal updated successfully.');
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
