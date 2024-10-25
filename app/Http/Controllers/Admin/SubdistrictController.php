<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subdistrict;
use App\Models\District;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class SubdistrictController extends Controller
{
    public function index()
    {
        // Subdistrict::where(function ($query) {
        //     $query->whereNull('district_id')
        //         ->orWhere('district_id', 0);
        // })->chunk(100, function ($subdistricts) {
        //     foreach ($subdistricts as $subdistrict) {
        //         $district = District::where('district_code', $subdistrict->district_code)->first();
        //         if ($district) {
        //             $subdistrict->district_id = $district->district_id;
        //             $subdistrict->save();
        //         }
        //     }
        // });
        $subdistricts = Subdistrict::all();
        return view('backend.subdistricts.index', compact('subdistricts'));
    }

    public function create()
    {
        $districts = District::all();
        return view('backend.subdistricts.create', compact('districts'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subdistrict_name' => 'required|string|max:255|unique:subdistricts,subdistrict_name',
            'subdistrict_code' => 'required|integer|digits_between:1,10|unique:subdistricts,subdistrict_code',
            'district_id' => 'required|exists:districts,district_id',
            'status' => 'required|string|in:0,1',
        ]);

        if ($validator->fails()) {
            //dd($validator->errors()->all());
            return back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();
        $district = District::where('district_id', $request->district_id)->firstOrFail();
        $district_code = $district->district_code;
        $validatedData['district_code'] = $district_code;
        Subdistrict::create($validatedData);
        return redirect()->route('subdistricts.index')->with('success', 'Subdistrict added successfully.');
    }

    public function edit(string $id)
    {
        $subdistrict = Subdistrict::findOrFail($id);
        $districts = District::where('status', 1)
            ->where('deleted', 0)
            ->get();
        return view('backend.subdistricts.edit', compact('subdistrict', 'districts'));
    }

    public function update(Request $request, $subdistrictid)
    {
        $subdistrict = Subdistrict::findOrFail($subdistrictid);

        // Validation rules
        $validator = Validator::make($request->all(), [
            'subdistrict_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('subdistricts')->ignore($subdistrict->subdistrict_id, 'subdistrict_id'),
            ],
            'subdistrict_code' => [
                'required',
                'integer',
                'digits_between:1,10',
                Rule::unique('subdistricts')->ignore($subdistrict->subdistrict_id, 'subdistrict_id'),
            ],
            'district_id' => 'required|integer|exists:districts,district_id',
            'status' => 'required|string|in:0,1',
        ]);

        // Check for validation errors
        if ($validator->fails()) {
            dd($validator->errors()->all());
            return back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();
        $district = District::where('district_id', $request->district_id)->firstOrFail();
        $district_code = $district->district_code;
        $validatedData['district_code'] = $district_code;
        $subdistrict->fill($validatedData);
        $subdistrict->save();
        return redirect()->route('subdistricts.index')->with('success', 'SubDistrict updated successfully.');
    }

    public function destroy($id)
    {
        $subdistrict = Subdistrict::findOrFail($id);
        $subdistrict->delete();
        return redirect()->route('subdistricts.index')->with('success', 'Subdistrict deleted successfully.');
    }
}
