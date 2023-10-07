<?php

namespace App\Http\Controllers;

use App\Models\Cattle;
use Illuminate\Http\Request;

class CattleController extends Controller
{
    public function index()
    {
        $cattle = Cattle::whereNotIn('status',['dead','sold'])->get();
        return view('cattle.index', compact('cattle'));
    }

    public function showRegisterPage()
    {
        return view('cattle.register');
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

        $cattle = new Cattle();
        $cattle->name = $request->input('name');
        $cattle->age = $request->input('age');
        $cattle->sex = $request->input('sex');
        $cattle->breed = $request->input('breed');
        $cattle->mother = $request->input('mother');
        $cattle->date_of_birth = $request->input('date_of_birth');
        $cattle->date_of_arrival = $request->input('date_of_arrival');
        $cattle->weight = $request->input('weight');
        $cattle->status = $request->input('status');
        $cattle->color = $request->input('color');
        $cattle->save();

        return redirect('/cattle')->with('success', 'Cattle registered successfully.');
    }

    public function showEditPage(Cattle $cattle)
    {
        return view('cattle.edit', compact('cattle'));
    }

    public function edit(Request $request)
    {
        if ($request->isMethod('post')) {
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

            $cattleId = $request->input('cattle_id');
            $cattle = Cattle::findOrFail($cattleId);
            $cattle->name = $name;
            $cattle->age = $validatedData['age'];
            $cattle->sex = $validatedData['sex'];
            $cattle->breed = $validatedData['breed'];
            $cattle->mother = $mother;
            $cattle->date_of_birth = $validatedData['date_of_birth'];
            $cattle->date_of_arrival = $validatedData['date_of_arrival'];
            $cattle->weight = $validatedData['weight'];
            $cattle->status = $validatedData['status'];
            $cattle->color = $validatedData['color']; 
            $cattle->save();

            return redirect('/cattle')->with('success', 'Cattle updated successfully.');
        } else {
            $cattleId = $request->input('cattle_id');
            $cattle = Cattle::findOrFail($cattleId);
            return view('cattle.edit', compact('cattle'));
        }
    }

    public function destroy(Cattle $cattle)
    {
        $cattle->delete();

        return redirect()->route('cattle.index')->with('success', 'Cattle deleted successfully.');
    }

    public function getFemaleCattle()
    {
        $items = Cattle::where('sex', 'female')
                    ->whereNotIn('status',['dead','sold'])
                    ->get();
        return view('cattle.show', compact('items'));
    }

    public function getMaleCattle()
    {
        $items = Cattle::where('sex', 'male')
                    ->whereNotIn('status',['dead','sold'])
                    ->get();
        return view('cattle.show', compact('items'));
    }

    public function getCattleForSale()
    {
        $items = Cattle::where('status', 'fattening')->get();
        return view('cattle.show', compact('items'));
    }

    public function getDeadCattle()
    {
        $items = Cattle::where('status', 'dead')->get();
        return view('cattle.show', compact('items'));
    }

    public function getQuarantineCattle()
    {
        $items = Cattle::where('status', 'quarantine')->get();
        return view('cattle.show', compact('items'));
    }

    public function getSoldCattle()
    {
        $items = Cattle::where('status', 'sold')->get();
        return view('cattle.show', compact('items'));
    }
}


