<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\vacances;
use Illuminate\Http\Request;

class VcancesController extends Controller
{
    public function index()
    {
        $vacanes = vacances::with('employee')->get();
        $employees = Employee::all();
        return view('vacances.index', compact('vacanes','employees'));
    }
    public function store(Request $request)
    {
        $employee = Employee::findOrFail($request->employee_id);


        $existingEmployer = vacances::where('employee_id', $employee->id)->first();
        if ($existingEmployer) {

            return redirect()->back()->with('error', 'Employer existe"'.$employee->nom.$employee->prenom.'" déjà pour le Vacances.');
        }

        $validatedData = $request->validate([
            'employee_id' => 'required',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'type' => 'required|string|max:25',
        ]);


        vacances::create($validatedData);

        return redirect()->route('countdown.home');
    }
    public function storee(Request $request)
    {

            $expiredMessage = new vacances;
            $expiredMessage->message = 'expired';

            $expiredMessage->save();


        // Rediriger vers une autre page
        return redirect()->route('countdown.home');
    }

    public function destroy($id)
    {
        $vacance = vacances::where('id', $id)->firstOrFail();
        $vacance->delete();

        return redirect()->route('countdown.home')->with('success', 'La période de congé de l.'.'employé a été supprimée avec succès');
    }
}
