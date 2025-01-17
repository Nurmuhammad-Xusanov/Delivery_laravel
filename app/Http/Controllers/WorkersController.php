<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class WorkersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereHas('roles')->get();
        return view('admin.workers.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.workers.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required|max:30',
            'email' => 'string|required',
            'number' => 'string|required',
            'password' => 'string|required',
            'role' => 'string|required',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::findOrFail($request->role);
        $user->assignRole($role);
        return redirect()->route('workers.index')->with('success', 'User created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.workers.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = Role::all();
        $user = User::findOrFail($id);
        return view('admin.workers.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|required|max:30',
            'email' => 'string|required|email|unique:users,email,' . $id,
            'number' => 'string|required',
            'password' => 'nullable|string|min:8',
            'role' => 'string|required',
        ]);

        $user = User::findOrFail($id);


        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);


        $role = Role::findByName($request->role);
        $user->syncRoles([$role->name]);

        return redirect()->route('workers.index')->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        foreach ($user->roles as $role) {
            $user->removeRole($role->name);
        }
        $user->delete();
        return redirect()->route('workers.index')->with('success', 'User deleted successfully!');
    }
}
