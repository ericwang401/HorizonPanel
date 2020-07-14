<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public function index(Request $request)
    {
        // display all roles 
        if ( !empty($request->q) ) // if user specifies a query to search through the model
        {
            // to search the table

            return view('admin.roles.index', ['roles' => \Spatie\Permission\Models\Role::where('name', 'LIKE', "%{$request->q}%")->paginate(config('horizonapp.pagination_length')), 'q' => $request->q]);
        }
        
        return view('admin.roles.index', ['roles' => \Spatie\Permission\Models\Role::paginate(config('horizonapp.pagination_length'))]);
    }

    public function destroy(Role $role)
    {
        // Delete role (very simple lol)
        $role->delete();

        return redirect(route('admin.roles'))->with(['type' => 'alert-success', 'info' => __('admin.role_deleted')]);
    }

    public function create()
    {
        // Display form to create a new role
        return view('admin.roles.create', ['permissions' => Permission::all()]);
    }

    public function store(Request $request)
    {
        // Store the role and add the specified permissions in the form
        $request->validate(['name' => 'required|unique:roles']);

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions(); // forget cache to avoid conflict

        Role::create(['name' => $request->name])->givePermissionTo($request->permissions); // Create the role and assign permissions

        return redirect(route('admin.roles'))->with(['type' => 'alert-success', 'info' => __('admin.role_created')]);
    }

    public function edit(Role $role)
    {
        // Give the ability to edit the role
        return view('admin.roles.update', ['role' => $role, 'permissions' => Permission::all()]);
    }

    public function update(Request $request, Role $role)
    {
        // Update the permissions on the role

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions(); // forget cache to avoid conflict

        $role->syncPermissions($request->permissions);

        return redirect(route('admin.roles'))->with(['type' => 'alert-success', 'info' => __('admin.role_updated')]);

    }
}
