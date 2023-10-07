<?php

namespace App\Http\Controllers;

use App\Models\Sheep;
use Illuminate\Http\Request;

class SheepController extends Controller
{
    public function index()
    {
        $sheep = Sheep::whereNotIn('status',['dead','sold'])->get();
        return view('sheep.index', compact('sheep'));
    }

    public function showRegisterPage()
    {
        return view('sheep.register');
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
            'color' => 'nullable|string|max:255', 
        ]);

        $name = str_replace(' ', '', strtoupper($request->input('name')));
        $mother = str_replace(' ', '', strtoupper($request->input('mother')));

        if (Sheep::where('name', $name)
            ->whereNotIn('status', ['dead', 'sold'])
            ->exists()) {
            return redirect('/sheep/register')->with('error', 'Sheep with the same name already exists.');
        }

        $sheep = new Sheep();
        $sheep->name = $name;
        $sheep->age = $request->input('age');
        $sheep->sex = $request->input('sex');
        $sheep->breed = $request->input('breed');
        $sheep->mother = $mother;
        $sheep->date_of_birth = $request->input('date_of_birth');
        $sheep->date_of_arrival = $request->input('date_of_arrival');
        $sheep->weight = $request->input('weight');
        $sheep->status = $request->input('status');
        $sheep->color = $request->input('color');
        $sheep->save();

        return redirect('/sheep')->with('success', 'Sheep registered successfully.');
    }

    public function showEditPage(Sheep $sheep)
    {
        return view('sheep.edit', compact('sheep'));
    }

    public function edit(Request $request, $sheepId)
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

        $name = str_replace(' ', '', strtoupper($request->input('name')));
        $mother = str_replace(' ', '', strtoupper($request->input('mother')));

        $sheep = Sheep::findOrFail($sheepId);

        $sheep->name = $name;
        $sheep->age = $validatedData['age'];
        $sheep->sex = $validatedData['sex'];
        $sheep->breed = $validatedData['breed'];
        $sheep->mother = $mother;
        $sheep->date_of_birth = $validatedData['date_of_birth'];
        $sheep->date_of_arrival = $validatedData['date_of_arrival'];
        $sheep->weight = $validatedData['weight'];
        $sheep->status = $validatedData['status'];
        $sheep->color = $validatedData['color'];

        $sheep->save();

        return redirect('/sheep')->with('success', 'Sheep updated successfully.');
    }


    public function destroy(Sheep $sheep)
    {
        $sheep->delete();

        return redirect()->route('sheep.index')->with('success', 'Sheep deleted successfully.');
    }

    public function getFemaleSheep()
    {
        $items = Sheep::where('sex', 'female')
                    ->whereNotIn('status',['dead', 'sold'])
                    ->get();
        $heading = 'Female Sheep'; 
        return view('sheep.show', compact('items', 'heading'));
    }

    public function getMaleSheep()
    {
        $items = Sheep::where('sex', 'male')
                    ->whereNotIn('status',['dead', 'sold'])
                    ->get();
        $heading = 'Male Sheep'; 
        return view('sheep.show', compact('items', 'heading'));
    }

    public function getSheepForSale()
    {
        $items = Sheep::where('status', 'fattening')->get(); 
        $heading = 'Sheep for Sale'; 
        return view('sheep.show', compact('items', 'heading'));
    }

    public function getDeadSheep()
    {
        $items = Sheep::where('status', 'dead')->get();
        $heading = 'Dead Sheep'; 
        return view('sheep.show', compact('items', 'heading'));
    }

    public function getQuarantineSheep()
    {
        $items = Sheep::where('status', 'quarantine')->get();
        $heading = 'Quarantine Sheep'; 
        return view('sheep.show', compact('items', 'heading'));
    }

    public function getSoldSheep()
    {
        $items = Sheep::where('status', 'sold')->get();
        $heading = 'Sold Sheep'; 
        return view('sheep.show', compact('items', 'heading'));
    }
}
