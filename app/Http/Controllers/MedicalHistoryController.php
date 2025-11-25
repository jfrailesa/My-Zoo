<?php

namespace App\Http\Controllers;
use App\Models\MedicalHistory;

use Illuminate\Http\Request;

class MedicalHistoryController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    // Display all MedicalHistorys
    public function index()
    {
        $MedicalHistorys = MedicalHistory::all();
        return view('MedicalHistorys.index', compact('MedicalHistorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
   // Show form to create a new MedicalHistory
    public function create()
    {
        return view('MedicalHistorys.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    // Store new MedicalHistory in database
    public function store(Request $request)
    {
        $request->validate([
            'lastcheckup' => 'required',
            'description' => 'required',
        ]);

        MedicalHistory::create($request->only(['lastcheckup', 'description']));

        return redirect()->route('MedicalHistorys.index')->with('success', 'MedicalHistory added successfully!');
    }

    /**
     * Display the specified resource.
     */
     // Show a specific MedicalHistory 
    public function show(MedicalHistory $MedicalHistory)
    {
        return view('MedicalHistorys.show', compact('MedicalHistory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Show form to edit an MedicalHistory 
    public function edit(MedicalHistory $MedicalHistory)
    {
        return view('MedicalHistorys.edit', compact('MedicalHistory'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Update an existing MedicalHistory 
    public function update(Request $request, MedicalHistory $MedicalHistory)
    {
        $request->validate([
            'lastcheckup' => 'required',
            'description' => 'required',
        ]);

        $MedicalHistory->update($request->only(['lastcheckup', 'description']));

        return redirect()->route('MedicalHistorys.index')->with('success', 'MedicalHistory updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    // Delete an MedicalHistory (for future use)
    public function destroy(MedicalHistory $MedicalHistory)
    {
        $MedicalHistory->delete();
        return redirect()->route('MedicalHistorys.index')->with('success', 'MedicalHistory deleted successfully!');
    }
}
