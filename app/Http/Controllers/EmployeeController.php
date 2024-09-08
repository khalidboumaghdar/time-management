<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('index', compact('employees'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
         $request->validate([
            'cin' => 'required|unique:employees',
            'nom' => 'required|string|max:25',
            'prenom' => 'required|string|max:25',
            'poste' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        // Employee::create($validatedData);

        // return redirect()->route('index');

        $cin = $request->input('cin');
        // dd($cin);
        $employee = Employee::where('cin', $cin)->first();
        if ($employee) {
            return redirect()->back()->withInput()->withErrors(['cin' => ' CIN existe déjà dans la base de données']);
        }


        $employee = new Employee;
        $employee->nom = $request->input('nom');
        $employee->prenom = $request->input('prenom');
        $employee->poste = $request->input('poste');
                $employee->cin = $cin;
        $image = $request->file('image');

        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $employee->photo = $imageName;

        $employee->save();

        return redirect()->route('employees.index');
    }
    public function search(Request $request)
{
    $name = $request->input('name');
    $employees = Employee::where('nom', 'like', '%'.$name.'%')->get();
    return view('index', compact('employees'));
}


    public function edit($id)
    {
        $employee = Employee::find($id);

    if ($employee) {
        return view('edit', ['employee' => $employee]);
    } else {
        return redirect()->route('employees.index')->with('error', 'Employee not found');
    }
    }


    public function update(Request $request, $id)
    {
        $employees = Employee::findOrFail($id);

        $request->validate([
            'cin' => 'required|string|max:25',
            'nom' => 'required|string|max:25',
            'prenom' => 'required|string|max:25',
            'poste' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $employees->cin = $request->input('cin');
        $employees->nom = $request->input('nom');
        $employees->prenom = $request->input('prenom');
        $employees->poste = $request->input('poste');

        if ($request->hasFile('photo')) {
            // Delete the old image file
            Storage::delete('images/'.$employees->photo);

            // Store the new image file
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $employees->photo = $imageName;
        }

        $employees->save();
        $employees = Employee::all(); // Query all employees from database
        return view('index', compact('employees')); // Pass employees variable to the view
    }


    public function destroy($id)
    {
        // $employee = Employee::where('id', $id)->firstOrFail();



        $employee = Employee::find($id);
        if ($employee) {
            $pointages = $employee->pointages;
            foreach ($pointages as $pointage) {
                $pointage->delete();
            }
            $vacances = $employee->vacances;
            foreach ($vacances as $vacance) {
                $vacance->delete();
            }
            $employee->delete();
            return redirect()->route('employees.index');
        }


    }
}
