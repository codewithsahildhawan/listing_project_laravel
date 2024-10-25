<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\State;
use Illuminate\Validation\Rule;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $districts = District::with('state')
                    ->where('status', 1)
                    ->where('deleted', 0)
                    ->get();
        return view('backend.districts.index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::all();
        return view('backend.districts.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'district_name' => 'required|string|max:255|unique:districts,district_name',
            'state_id' => 'required|exists:states,state_id',
        ]);

        District::create($request->all());
        return redirect()->route('districts.index')->with('success', 'District added successfully.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $district = District::findOrFail($id); // Fetch the district by ID
        $states = State::all(); // Get all states

        return view('backend.districts.edit', compact('district', 'states')); // Pass district and states to the view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $district = District::findOrFail($id); // Fetch the existing district

        $request->validate([
                'district_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('districts')->ignore($district->id), // Ignore the current state
            ],
            'state_id' => 'required|exists:states,state_id',
        ]);

        // Update the district
        $district->update($request->all());
        return redirect()->route('districts.index')->with('success', 'District updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $district = District::findOrFail($id);
        $district->delete();
        return redirect()->route('districts.index')->with('success', 'District deleted successfully.');
    }
}
