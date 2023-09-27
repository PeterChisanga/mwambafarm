<?php

namespace App\Http\Controllers;

use App\Models\Goat;
use Illuminate\Http\Request;

class GoatController extends Controller
{
    public function index()
    {
        $goats = Goat::all();
        return view('goats.index', compact('goats'));
    }

    public function showRegisterPage()
    {
        return view('goats.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'nullable|integer|min:1',
            'sex' => 'nullable|string|max:255',
            'breed' => 'required|string|max:255',
            'mother' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'date_of_arrival' => 'nullable|date',
            'weight' => 'nullable|numeric|min:0.1',
            'status' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255', // Added color field
        ]);

        $goat = new Goat();
        $goat->name = $request->input('name');
        $goat->age = $request->input('age');
        $goat->sex = $request->input('sex');
        $goat->breed = $request->input('breed');
        $goat->mother = $request->input('mother');
        $goat->date_of_birth = $request->input('date_of_birth');
        $goat->date_of_arrival = $request->input('date_of_arrival');
        $goat->weight = $request->input('weight');
        $goat->status = $request->input('status');
        $goat->color = $request->input('color'); // Added color field
        $goat->save();

        return redirect('/goats')->with('success', 'Goat registered successfully.');
    }

    public function showEditPage(Goat $goat)
    {
        return view('goats.edit', compact('goat'));
    }

    public function edit(Request $request, $goatId)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'nullable|integer|min:1',
            'sex' => 'nullable|string|max:255',
            'breed' => 'required|string|max:255',
            'mother' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'date_of_arrival' => 'nullable|date',
            'weight' => 'nullable|numeric|min:0.1',
            'status' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255', 
        ]);

        $goat = Goat::findOrFail($goatId);

        $goat->name = $validatedData['name'];
        $goat->age = $validatedData['age'];
        $goat->sex = $validatedData['sex'];
        $goat->breed = $validatedData['breed'];
        $goat->mother = $validatedData['mother'];
        $goat->date_of_birth = $validatedData['date_of_birth'];
        $goat->date_of_arrival = $validatedData['date_of_arrival'];
        $goat->weight = $validatedData['weight'];
        $goat->status = $validatedData['status'];
        $goat->color = $validatedData['color'];

        $goat->save();

        return redirect('/goats')->with('success', 'Goat updated successfully.');
    }

    public function destroy(Goat $goat)
    {
        $goat->delete();

        return redirect()->route('goats.index')->with('success', 'Goat deleted successfully.');
    }

    public function getFemaleGoats()
    {
        $items = Goat::where('sex', 'female')->get();
        $heading = 'Female Goats'; 
        return view('goats.show', compact('items', 'heading'));
    }

    public function getMaleGoats()
    {
        $items = Goat::where('sex', 'male')->get();
        $heading = 'Male Goats'; 
        return view('goats.show', compact('items', 'heading'));
    }

    public function getGoatsForSale()
    {
        $items = Goat::where('status', 'fattening')->get(); 
        $heading = 'Goats for Sale'; 
        return view('goats.show', compact('items', 'heading'));
    }

    public function getDeadGoats()
    {
        $items = Goat::where('status', 'dead')->get();
        $heading = 'Dead Goats'; 
        return view('goats.show', compact('items', 'heading'));
    }

    public function getQuarantineGoats()
    {
        $items = Goat::where('status', 'quarantine')->get();
        $heading = 'Quarantine Goats'; 
        return view('goats.show', compact('items', 'heading'));
    }

    public function getSoldGoats()
    {
        $items = Goat::where('status', 'sold')->get();
        $heading = 'Sold Goats'; 
        return view('goats.show', compact('items', 'heading'));
    }

}

