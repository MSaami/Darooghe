<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{


	public function index(Request $request)
	{
		$users = User::with('roles')->get();
		return view('users.list' , compact('users'));
	}



	public function edit(Request $request , User $user)
	{
		$userPermissions = $user->permissions->pluck('name');
		$userRoles = $user->roles->pluck('name');
		$permissions = Permission::all();
		$roles=  Role::all();
		return view('users.edit' , compact('permissions' , 'roles' , 'user' , 'userPermissions' , 'userRoles'));
	}


	public function update(Request $request , User $user)
	{
		$user->refreshPermissions($request->permissions);
		$user->refreshRoles($request->roles);

		return back()->with('success' , true);
	}
}
