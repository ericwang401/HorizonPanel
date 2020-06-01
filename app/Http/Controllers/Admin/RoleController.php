<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        // display all roles 
        if ( !empty($request->q) ) // if user specifies a query to search through the model
        {
            // to search the table

            $searchString = $request->q;

            $results = \Spatie\Permission\Models\Role::where('name', 'LIKE', "%{$searchString}%")->paginate(config('horizonapp.pagination_length'));

            return view('admin.roles', ['roles' => $results, 'q' => $request->q]);
        }
        
        return view('admin.roles', ['roles' => \Spatie\Permission\Models\Role::paginate(config('horizonapp.pagination_length'))]);
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
        return view('admin.create_role', ['permissions' => Permission::all()]);
    }

    public function store(Request $request)
    {
        // Store the role and add the specified permissions in the form
        $request->validate(['name' => 'required|unique:roles']);

        $permissions = array_keys(array_slice($request->all(), 2));

        foreach ($permissions as &$permission) // by default, a permission "view panel" would be converted to "view_panel". We want to convert it back with the whitespace
        {
            $permission = str_replace('_', ' ', $permission);
        }

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions(); // forget cache to avoid conflict

        Role::create(['name' => $request->name])->givePermissionTo($permissions); // Create the role and assign permissions

        return redirect(route('admin.roles'))->with(['type' => 'alert-success', 'info' => __('admin.role_created')]);
    }
}
