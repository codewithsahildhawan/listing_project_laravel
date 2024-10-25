<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\State;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // District::where(function ($query) {
        //     $query->whereNull('state_id')
        //         ->orWhere('state_id', 0);
        // })->chunk(100, function ($districts) {
        //     foreach ($districts as $district) {
        //         $state = State::where('state_code', $district->state_code)->first();
        //         if ($state) {
        //             $district->state_id = $state->state_id;
        //             $district->save();
        //         }
        //     }
        // });
        $districts = District::with('state')->get();
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
            'district_code' => 'required|integer|digits_between:1,10|unique:districts,district_code',
            'state_id' => 'required|integer|exists:states,state_id',
            'status' => 'required|string|in:0,1',
        ]);
        $state = State::where('state_id', $request->state_id)->firstOrFail();
        $state_code = $state->state_code;
        $data = $request->all();
        $data['state_code'] = $state_code;
        District::create($data);
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
        $district = District::findOrFail($id);
        $states = State::where('status', 1)
        ->where('deleted', 0)
        ->get();
        return view('backend.districts.edit', compact('district', 'states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $districtId)
    {
        // Retrieve the district or fail if not found
        $district = District::findOrFail($districtId);

        // Validation rules
        $validator = Validator::make($request->all(), [
            'district_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('districts')->ignore($district->district_id, 'district_id'), // Ignore current district_id
            ],
            'district_code' => [
                'required',
                'integer',
                'digits_between:1,10',
                Rule::unique('districts')->ignore($district->district_id, 'district_id'), // Ignore based on district_id
            ],
            'state_id' => 'required|integer|exists:states,state_id',
            'status' => 'required|string|in:0,1',
        ]);

        // Check for validation errors
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();
        $state = State::where('state_id', $request->state_id)->firstOrFail();
        $state_code = $state->state_code;
        $validatedData['state_code'] = $state_code;
        $district->fill($validatedData);
        $district->save();
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
