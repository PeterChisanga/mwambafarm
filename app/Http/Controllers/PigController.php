<?php

namespace App\Http\Controllers;

use App\Models\Pig;
use Illuminate\Http\Request;

class PigController extends Controller
{
    public function index()
    {
        $pigs = Pig::all();
        return view('pigs.index', compact('pigs'));
    }

    public function showRegisterPage()
    {
        return view('pigs.register');
    }

    public function register(Request $request)
    {
        // if (!session()->get('adminUser')) {
        //     return redirect()->route('admin.login');
        // }

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

            $pig = new Pig();
            $pig->name = $request->input('name');
            $pig->age = $request->input('age');
            $pig->sex = $request->input('sex');
            $pig->breed = $request->input('breed');
            $pig->mother = $request->input('mother');
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

            $cattleId = $request->input('cattle_id');
            $cattle = Cattle::findOrFail($cattleId);
            $cattle->name = $validatedData['name'];
            $cattle->age = $validatedData['age'];
            $cattle->sex = $validatedData['sex'];
            $cattle->breed = $validatedData['breed'];
            $cattle->mother = $validatedData['mother'];
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

    public function destroy(Pig $pig)
    {
        $pig->delete();

        return redirect()->route('pigs.index')->with('success', 'Pig deleted successfully.');
    }

    public function getFemalePigs()
    {
        $femalePigs = Pig::where('sex', 'female')->get();
        return view('pigs.females', compact('femalePigs'));
    }

    public function getMalePigs()
    {
        $malePigs = Pig::where('sex', 'male')->get();
        return view('pigs.males', compact('malePigs'));
    }

    public function getPigsForSale()
    {
        $pigsForSale = Pig::where('status', 'fattening')->get();
        return view('pigs.fattenning', compact('pigsForSale'));
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
