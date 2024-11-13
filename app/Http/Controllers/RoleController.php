<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all roles from the database along with their associated permissions
        $roles = Role::with('permissions')->get();

        // Return the view with the roles data
        return view('backend.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $roles = Role::all();
        // // Fetch permissions from the database
        // $permissions = Permission::all();

        // // Return the create role view with permissions
        // return view('backend.role.create', compact('roles', 'permissions'));

        // $roles = Role::all(); // Retrieve all existing roles
        // $permissions = Permission::all(); // Retrieve all permissions
        // return view('backend.role.create', compact('roles', 'permissions'));
        $permissions = Permission::where('guard_name', 'sanctum')->get();
        return view('backend.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // // Validate the request data
        // $request->validate([
        //     'name' => 'required|string|max:255|unique:roles,name',
        //     'permissions' => 'required|array', // Make sure permissions are selected
        // ]);

        // // Create the role
        // $role = Role::create(['name' => $request->name]);

        // // Assign the selected permissions to the role
        // $role->givePermissionTo($request->permissions);

        // // Redirect with success message
        // return redirect()->route('role.create')->with('success', 'Role created successfully!');

        // Check if an existing role was selected
        // if ($request->role_id) {
        //     $role = Role::findOrFail($request->role_id);
        // } else {
        //     // Create a new role if no existing role was selected
        //     $role = Role::create(['name' => $request->name]);
        // }

        // // Sync permissions to the selected or newly created role
        // $role->syncPermissions($request->permissions);

        // return redirect()->route('role.index')->with('success', 'Role created or updated successfully');
        // Validate incoming request data
        // $validatedData = $request->validate([
        //     'name' => 'required|string|unique:roles,name',
        //     'permissions' => 'nullable|array',  // assuming permissions are sent as an array of permission IDs or names
        //     'permissions.*' => 'exists:permissions,id'  // check each permission exists in permissions table
        // ]);

        // try {
        //     // Create the role with the correct guard
        //     $role = Role::create([
        //         'name' => $validatedData['name'],
        //         'guard_name' => 'sanctum'
        //     ]);

        //     // Attach selected permissions to the role if any are provided
        //     if (isset($validatedData['permissions'])) {
        //         $permissions = Permission::whereIn('id', $validatedData['permissions'])
        //             ->orWhereIn('name', $validatedData['permissions']) // in case permissions are passed by name
        //             ->get();

        //         $role->syncPermissions($permissions);
        //     }

        //     return redirect()->route('role.index')->with('success', 'Role created successfully with assigned permissions.');
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error', 'Failed to create role: ' . $e->getMessage());
        // }

        // Validate incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|unique:roles,name',
            'permissions' => 'nullable|array',  // assuming permissions are sent as an array of permission IDs
            'permissions.*' => 'exists:permissions,id'  // check each permission exists in permissions table
        ]);

        try {
            // Create the role with the correct guard
            $role = Role::create([
                'name' => $validatedData['name'],
                'guard_name' => 'sanctum'
            ]);

            // Attach selected permissions to the role if any are provided
            if (!empty($validatedData['permissions'])) {
                $permissions = Permission::where('guard_name', 'sanctum')
                    ->whereIn('id', $validatedData['permissions'])
                    ->get();

                $role->syncPermissions($permissions);
            }

            return redirect()->route('role.index')->with('success', 'Role created successfully with assigned permissions.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create role: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Retrieve the role by ID
        $role = Role::findOrFail($id);

        // Pass the role to the edit view
        return view('backend.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Find the role by ID
        $role = Role::findOrFail($id);

        // Update the role's attributes
        $role->name = $request->input('name');

        // Save the changes to the database
        $role->save();

        // Redirect back to the role list with a success message
        return redirect()->route('role.index')->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the role by ID
        $role = Role::findOrFail($id);

        // Attempt to delete the role
        if ($role->delete()) {
            // If successful, redirect with a success message
            return redirect()->route('role.index')->with('success', 'Role deleted successfully.');
        } else {
            // If there was an issue deleting, redirect with an error message
            return redirect()->route('role.index')->with('error', 'Failed to delete role.');
        }
    }
}
