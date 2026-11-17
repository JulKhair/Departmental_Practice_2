<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use Illuminate\Validation\Rule;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $equipment = Equipment::latest()->paginate(10);

    return view('equipment.index', compact('equipment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validated = $request->validate([
        'equipment_name' => ['required', 'string', 'max:255'],
        'category' => ['required', Rule::in([
            'paddles',
            'balls',
            'nets',
            'accessories',
        ])],
        'unit_price' => ['required', 'numeric', 'min:0'],
        'description' => ['required', 'string'],
        'availability_status' => ['required', Rule::in([
            'available',
            'unavailable',
        ])],
    ]);

    $request->user()->equipment()->create($validated);

    return redirect()
        ->route('equipment.index')
        ->with('success', 'Equipment added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipment $equipment)
    {
    return view('equipment.show', compact('equipment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipment $equipment)
    {
    return view('equipment.edit', compact('equipment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipment $equipment)
    {
    $validated = $request->validate([
        'equipment_name' => ['required', 'string', 'max:255'],
        'category' => ['required', Rule::in([
            'paddles',
            'balls',
            'nets',
            'accessories',
        ])],
        'unit_price' => ['required', 'numeric', 'min:0'],
        'description' => ['required', 'string'],
        'availability_status' => ['required', Rule::in([
            'available',
            'unavailable',
        ])],
    ]);

    $equipment->update($validated);

    return redirect()
        ->route('equipment.index')
        ->with('success', 'Equipment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipment $equipment)
    {
    $equipment->delete();

    return redirect()
        ->route('equipment.index')
        ->with('success', 'Equipment deleted successfully!');
    }
}
