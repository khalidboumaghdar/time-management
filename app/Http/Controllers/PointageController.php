<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Pointage;
use App\Models\vacances;
use Illuminate\Http\Request;

class PointageController extends Controller
{

    public function index()
{

    $pointages = Pointage::all();

    return view('pointages.index', compact('pointages'));
}

public function store(Request $request)
{
    $employee = Employee::findOrFail($request->employee_id);
    $date = $request->date;

    $existingPointage = Pointage::where('employee_id', $employee->id)
                                 ->where('date', $date)
                                 ->where('type', $request->type)
                                 ->first();

    if ($existingPointage) {

        return redirect()->back()->with('error', 'Un pointage "' . $request->type . '" existe déjà pour cet employé aujourd\'hui.');
    }

    $pointage = new Pointage();
    $pointage->employee_id = $request->employee_id;
    $pointage->date = $request->date;
    $pointage->time = $request->time;
    $pointage->type = $request->type;
    $pointage->save();

    return redirect()->route('pointages.index');
}
public function search(Request $request)
{
    $query = Pointage::query();

    if ($request->has('employee_name')) {
        $query->whereHas('employee', function ($q) use ($request) {
            $q->where('nom', 'LIKE', '%' . $request->employee_name . '%')
              ->orWhere('prenom', 'LIKE', '%' . $request->employee_name . '%');
        });
    }

    $pointages = $query->orderBy('Date', 'desc')->get();

    return view('pointages.index', compact('pointages'));
}

public function storee(Request $request)
{
    $employee = Employee::findOrFail($request->employee_id);
    $date = $request->Date;

    $existingPointage = Pointage::where('employee_id', $employee->id)
                                 ->where('date', $date)
                                 ->where('type', $request->Type)
                                 ->first();

    if ($existingPointage) {
        return redirect()->back()->with('error', 'Un pointage existe déjà pour cet employé maintenant.');
    }

    $validatedData = $request->validate([
        'employee_id' => 'required|exists:employees,id',
        'date' => 'required|date',
        'time' => 'required|date_format:H:i',
        'type' => 'required|string|max:255',
    ]);

    $data = new Pointage;
    $data->employee_id = $validatedData['employee_id'];
    $data->date = $validatedData['date'];
    $data->time = $validatedData['time'];
    $data->Type = $validatedData['type'];
    $data->save();




    return redirect()->route('pointages.show',compact('data'));
}

public function show(Pointage $data)
{
    return view('pointages.show', compact('data'));
}



public function create()
{
    $pointages = Pointage::all();
    $employees = Employee::all();
    $vacanes = vacances::all();
    $date = date('Y-m-d');

    return view('pointages.create', compact('employees','pointages','date','vacanes'));
}

public function createe()
{
    $pointages = Pointage::all();
    $employees = Employee::all();
    $vacanes = vacances::all();
    $date = date('Y-m-d');
    return view('pointages.pointage', compact('employees','pointages','date','vacanes'));
}


    public function edit(Pointage $pointage)
    {
        $employees = Employee::all();
        return view('pointages.edit', compact('pointage', 'employees'));
    }

    public function update(Request $request, Pointage $pointage)
    {
        $request->validate([
            'employee_id' => 'required',
            'start_time' => 'required|date_format:Y-m-d H:i:s',
            'end_time' => 'required|date_format:Y-m-d H:i:s|after:start_time',
        ]);

        $pointage->update($request->all());

        return redirect()->route('pointages.index')->with('success', 'Le pointage a été mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $pointage = Pointage::where('id', $id)->firstOrFail();
        $pointage->delete();

        return redirect()->route('pointages.index')->with('success', 'Le pointage a été supprimé avec succès.');
    }
}
