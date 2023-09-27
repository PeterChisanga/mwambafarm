<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chemical;

class ChemicalController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'intended_for_animal' => 'required|string|max:255',
            'quantity' => 'required|string|max:255',
            'price' => 'required|numeric|min:0.01',
        ]);

        $chemical = Chemical::create($validatedData);

        return redirect()->route('chemicals.index')->with('success', 'Chemical registered successfully.');
    }

    public function index()
    {
        $chemicals = Chemical::all();
        return view('chemicals.index', compact('chemicals'));
    }

    public function showRegisterPage()
    {
        return view('chemicals.register');
    }

    public function showEditPage(Chemical $chemical)
    {
        return view('chemicals.edit', compact('chemical'));
    }

    public function editChemical(Request $request, Chemical $chemical)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'intended_for_animal' => 'required|string|max:255',
            'quantity' => 'required|string|max:255',
            'price' => 'required|numeric|min:0.01',
        ]);

        $chemical->update($validatedData);

        return redirect()->route('chemicals.index')->with('success', 'Chemical updated successfully.');
    }

    public function deleteChemical(Chemical $chemical)
    {
        $chemical->delete();

        return redirect()->route('chemicals.index')->with('success', 'Chemical deleted successfully.');
    }

    // ...
}

