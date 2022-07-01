<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleManagementController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Role Permission Name
    |--------------------------------------------------------------------------
    */
    function role_permission_name(){
        $role_permission_names = Permission::all();
        return view('admin.role_permission_name', [
            'role_permission_names' => $role_permission_names,
        ]);

    }
    function role_permission_name_add(Request $request){
        $permission = Permission::create(['name' => $request->name]);
        return back()->with('add_role_name', 'Sucessfully added role name.');

    }

    /*
    |--------------------------------------------------------------------------
    | Role Add and Permission Assign
    |--------------------------------------------------------------------------
    */
    function role_permission(){
        $role_permission_names = Permission::all();
        return view('admin.role_permission', [
            'role_permission_names' => $role_permission_names,
        ]);
    }
    function role_permission_assign(Request $request) {
        $role = Role::create([
            'name' => $request->name,
        ]);
        $role->givePermissionTo($request->permission);
        return back()->with('role', 'Successfully Added Role');
    }
}
