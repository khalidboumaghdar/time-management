<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    public function index()
    {
        $Admin = User::all();
        return view('admin.index', compact('Admin'));
    }
    public function edit($id)
    {
        $Admins = User::findOrFail($id);
        return view('admin.edit', compact('Admins'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->utype = $request->utype;
        $user->save();

        return redirect()->route('Admin.index')
                         ->with('success', 'Le type d\'utilisateur a été modifié avec succès');
    }

    public function destroy($id)
{
    if(Auth::check()) {
        // Supprimer le compte de l'admin avec l'id correspondant
        $admin = User::find($id);
        if ($admin) {
            $admin->delete();
            return redirect()->route('login')->with('success', 'Admin deleted successfully');
        } else {
            return redirect()->route('Admin.index')->with('error', 'Admin not found');
        }
    } else {
        return redirect()->route('login');
    }
}
}
