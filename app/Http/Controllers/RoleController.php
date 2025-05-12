<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::all();
        return view('role.index', compact('role'));
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jabatan' => 'required|string|unique:roles,jabatan',
        ], [
            'jabatan.required' => 'Jabatan wajib diisi',
            'jabatan.unique' => 'Jabatan sudah ada',
        ]);

        Role::create([

            'jabatan' => ucwords($request->jabatan),
        ]);

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('role.update', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jabatan' => 'required|string|unique:roles,jabatan,' . $id,
        ], [
            'jabatan.required' => 'Jabatan wajib diisi',
            'jabatan.unique' => 'Jabatan sudah ada',
        ]);

        $role = Role::findOrFail($id);
        $role->jabatan = ucwords($request->jabatan);
        $role->save();

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
