<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\State;
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
        return view('backend.state.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'state_name' => 'required|string|max:255|unique:states,state_name',
            'state_code' => 'nullable|string|max:10',
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
        $states = State::all();
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
    public function update(Request $request, State $state)
    {
        // Validate the request data
        $validatedData = $request->validate([
                'state_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('states')->ignore($state->state_id), // Ignore the current state
            ],
            'state_code' => 'nullable|string|max:10',
            'status' => 'required|string|in:0,1', // Adjust according to your status values
        ]);

        // Update state data
        $state->fill($validatedData);

        // Only update the updated_at timestamp if the state data has changed
        if ($state->isDirty()) {
            $state->updated_at = now(); // Set updated_at to current timestamp
        } else {
            $state->updated_at = null; // Leave it blank if there's no change
        }

        $state->save();

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
