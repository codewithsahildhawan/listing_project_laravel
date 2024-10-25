<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subdistrict;
use App\Models\District;

class SubdistrictController extends Controller
{
    public function index()
    {
        $subdistricts = Subdistrict::with('district')->get();
        return view('backend.subdistricts.index', compact('subdistricts'));
    }

    public function create()
    {
        $districts = District::all();
        return view('backend.subdistricts.create', compact('districts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subdistrict_name' => 'required|string|max:255|unique:subdistricts,subdistrict_name',
            'district_id' => 'required|exists:districts,id',
        ]);

        Subdistrict::create($request->all());
        return redirect()->route('subdistricts.index')->with('success', 'Subdistrict added successfully.');
    }

    public function edit($id)
    {
        $subdistrict = Subdistrict::findOrFail($id);
        $districts = District::all();
        return view('backend.subdistricts.edit', compact('subdistrict', 'districts'));
    }

    public function update(Request $request, $id)
    {
        $subdistrict = Subdistrict::findOrFail($id);
        
        $request->validate([
            'subdistrict_name' => 'required|string|max:255|unique:subdistricts,subdistrict_name,' . $subdistrict->id,
            'district_id' => 'required|exists:districts,id',
        ]);

        $subdistrict->update($request->all());
        return redirect()->route('subdistricts.index')->with('success', 'Subdistrict updated successfully.');
    }

    public function destroy($id)
    {
        $subdistrict = Subdistrict::findOrFail($id);
        $subdistrict->delete();
        return redirect()->route('subdistricts.index')->with('success', 'Subdistrict deleted successfully.');
    }
}
