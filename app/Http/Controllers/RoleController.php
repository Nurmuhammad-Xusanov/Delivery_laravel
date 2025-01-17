<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'required',
        ]);
        $role = Role::create(['name' => $request->name]);
        foreach ($request->permissions as $permissionId) {
            $role->permissions()->attach($permissionId);
        }
        return redirect()->route('role.index')->with('success', 'Role created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::findOrFail($id);
        $users = User::whereHas($role->name);
        return view('admin.roles.show', compact('role', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permissions = Permission::all();
        $role = Role::findOrFail($id);
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {

        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $role->update(['name' => $request->name]);
        $role->permissions()->detach();
        foreach ($request->permissions as $permissionId) {
            $role->permissions()->attach($permissionId);
        }

        return redirect()->route('role.index')->with('success', 'Role updated successfully!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->permissions()->detach();
        $role->delete();
        return redirect()->route('role.index')->with('success', 'Role deleted successfully!');
    }
}
