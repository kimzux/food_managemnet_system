<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index()
    {
        abort_if(Auth::user()->cannot('View role'), 403, 'Access Denied');
        $roles = Role::all();

        return view('user-management.roles.index', compact('roles'));
    }

    public function edit(Role $role)
    {
        abort_if(Auth::user()->cannot('edit role'), 403, 'Access Denied');
        $permissions = Permission::all();
        $role->load('permissions');
        
        return view('user-management.roles.edit', compact('role', 'permissions'));
    }



    public function store(Request $request)
    {
        abort_if(Auth::user()->cannot('add role'), 403, 'Access Denied');

        $request->validate([
            'name' => ['required']
        ]);

        Role::create(['name' => $request->name]);

        return back();
    }
    
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'permissions' => ['array']
        ]);

        $role->syncPermissions($request->permissions);
        Alert::success('Success!', 'Successfully Role updated');
        return back();
    }
    public function destroy($id)
    {
        abort_if(Auth::user()->cannot('delete role'), 403, 'Access Denied');
        $role = Role::findOrFail($id);
        $role->delete();
        Alert::success('Success!', 'Successfully deleted');
        return back();
        // return redirect('/foodie')->with('success', 'Corona Case Data is successfully deleted');
    }
}
