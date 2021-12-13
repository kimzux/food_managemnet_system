<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        abort_if(Auth::user()->cannot('View users'), 403, 'Access Denied');
        $users = User::with('roles')->get();
        $roles = Role::all();
        return view('user-management.users.index',  compact('users', 'roles'));
    }

    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => ['required']
        ]);

        $user->assignRole($request->role);

        return back();
    }
    public function store(Request $request)
    {
        abort_if(Auth::user()->cannot('Create user'), 403, 'Access Denied');
        $validatedData = $request->validate([
            'name' => 'required | string | max:255',
            'email' => 'required | string | email | max:255 | unique:users',
            'password' => 'required | min:8 ',
        ]);

        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        Alert::success('Success!', 'Successfully added');
        return back();
        //   return redirect('/foodie')->with('success', 'Corona Case is successfully saved');

    }
    public function destroy($id)
    {
        abort_if(Auth::user()->cannot('Deleta User'), 403, 'Access Denied');
        $role = User::findOrFail($id);
        $role->delete();
        Alert::success('Success!', 'Successfully deleted');
        return back();
        // return redirect('/foodie')->with('success', 'Corona Case Data is successfully deleted');
    }
    public function edit($id)
    {
      abort_if(Auth::user()->cannot('Edit user'), 403, 'Access Denied');
            $user = User::findOrFail($id);
    
            return view('user-management.users.editUser', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required | string | max:255',
            'email' => 'required | string | email | max:255 | unique:users',
            'password' => 'required | min:8 ',
        ]);
        User::whereId($id)->update($validatedData);
        Alert::success('Success!', 'Successfully Updated');
        return back();
        //   return redirect('/foodie')->with('success', 'Corona Case is successfully saved');

    }
}

