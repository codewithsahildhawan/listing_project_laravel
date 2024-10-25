<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Show the form for creating a new resource.
     */

    public function index()
    {
        $states = State::all();
        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'states' => $states
            ], 200);
        }
        return view('backend.state.index', compact('states'));
    }

    public function create()
    {
        return view('backend.state.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'state_name' => 'required|string|max:255|unique:states,state_name',
            'state_code' => 'nullable|string|max:10|unique:states,state_code',
            'status' => 'required|string|in:0,1',
        ]);

        // Create and save the new state
        $state = State::create($validatedData);

        // Return a success response
        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'State saved successfully!',
                'state' => $state
            ], 201); // 201 status code for created
        }

        return redirect()->route('states.index')->with('success', 'State created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
        $states = State::where('status', 1)->where('deleted', 0)->get();
        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'states' => $states
            ], 200);
        }
        return view('backend.state.index', compact('states'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(State $state)
    {
        return view('backend.state.edit', compact('state'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $stateId) // Use $stateId to get the record
    {
        // Find the state using the custom primary key
        $state = State::where('state_id', $stateId)->firstOrFail(); // Use where() to find by state_id

        // Validate request data
        $validator = Validator::make($request->all(), [
            'state_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('states')->ignore($state->state_id, 'state_id'), // Ignore the current state's ID
            ],
            'state_code' => 'required|integer|digits_between:1,10',
            'status' => 'required|string|in:0,1',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            //dd($validator->errors()->all()); // This should show validation errors if they exist
            return back()->withErrors($validator)->withInput();
        }

        // Get validated data
        $validatedData = $validator->validated();

        // Fill the state with validated data
        $state->fill($validatedData);

        // Update the updated_at timestamp if the state data has changed
        if ($state->isDirty()) {
            $state->updated_at = now(); // Set to current timestamp
        }

        // Save the updated state
        $state->save();

        // Redirect back with a success message
        return redirect()->route('states.index')->with('success', 'State updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        $state->delete();
        return redirect()->route('states.index')->with('success', 'State deleted successfully!');
    }
}
