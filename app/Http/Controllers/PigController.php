<?php

namespace App\Http\Controllers;

use App\Models\Pig;
use Illuminate\Http\Request;

class PigController extends Controller
{
    public function index()
    {
        $pigs = Pig::whereNotIn('status', ['dead', 'sold'])->get();
        return view('pigs.index', compact('pigs'));
    }

    public function showRegisterPage()
    {
        return view('pigs.register');
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
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
            ]);

            $name = str_replace(' ', '', strtoupper($request->input('name')));
            $mother = str_replace(' ', '', strtoupper($request->input('mother')));

            if (Pig::where('name', $name)
                ->whereNotIn('status', ['dead', 'sold'])
                ->exists()) {
                return redirect('/pigs/register')->with('error', 'Pig with the same name already exists.');
            }

            $pig = new Pig();
            $pig->name = $name ;
            $pig->age = $request->input('age');
            $pig->sex = $request->input('sex');
            $pig->breed = $request->input('breed');
            $pig->mother = $mother;
            $pig->date_of_birth = $request->input('date_of_birth');
            $pig->date_of_arrival = $request->input('date_of_arrival');
            $pig->weight = $request->input('weight');
            $pig->status = $request->input('status');
            $pig->save();

            return redirect('/pigs')->with('success', 'Pig registered successfully.');
        }
    }

    public function showEditPage(Pig $pig)
    {
        return view('pigs.edit', compact('pig'));
    }

    public function edit(Request $request, $pigId)
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
            ]);

            $name = str_replace(' ', '', strtoupper($request->input('name')));
            $mother = str_replace(' ', '', strtoupper($request->input('mother')));

            $pig = Pig::findOrFail($pigId);
            $pig->name = $name;
            $pig->age = $validatedData['age'];
            $pig->sex = $validatedData['sex'];
            $pig->breed = $validatedData['breed'];
            $pig->mother = $mother;
            $pig->date_of_birth = $validatedData['date_of_birth'];
            $pig->date_of_arrival = $validatedData['date_of_arrival'];
            $pig->weight = $validatedData['weight'];
            $pig->status = $validatedData['status'];
            $pig->save();

            return redirect('/pigs')->with('success', 'Pig updated successfully.');
        } else {
            $pig = Pig::findOrFail($pigId);
            return view('pigs.edit', compact('pig'));
        }
    }

    public function destroy(Pig $pig)
    {
        $pig->delete();

        return redirect()->route('pigs.index')->with('success', 'Pig deleted successfully.');
    }

    public function getFemalePigs()
    {
        $femalePigs = Pig::where('sex', 'female')
                        ->whereNotIn('status', ['sold', 'dead'])
                        ->get();

        return view('pigs.females', compact('femalePigs'));
    }

    public function getMalePigs()
    {
        $malePigs = Pig::where('sex', 'male')
                    ->whereNotIn('status', ['sold', 'dead'])
                    ->get();

        return view('pigs.males', compact('malePigs'));
    }

    public function getPigsForSale()
    {
        $pigsForSale = Pig::where('status', 'fattening')->get();
        return view('pigs.fattening', compact('pigsForSale'));
    }

    public function getDeadPigs()
    {
        $deadPigs = Pig::where('status', 'dead')->get();
        return view('pigs.dead', compact('deadPigs'));
    }

    public function getQuarantinePigs()
    {
        $quarantinePigs = Pig::where('status', 'quarantine')->get();
        return view('pigs.quarantine', compact('quarantinePigs'));
    }

    public function getSoldPigs()
    {
        $soldPigs = Pig::where('status', 'sold')->get();
        return view('pigs.sold', compact('soldPigs'));
    }
}
