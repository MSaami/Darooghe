<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
	public function index(Request $request)
	{
		$roles = Role::all();
		return view('users.roles' , compact('roles'));
	}


	public function store(Request $request)
	{
		$this->validateForm($request);

		$role = Role::create($request->only('name' , 'persian_name'));

		return back()->with('success' , true);

	}



	public function edit(Request $request , Role $role)
	{
		$permissions = Permission::all();

		$role->load('permissions');

		return view('users.edit-role' , compact('role' , 'permissions' ));
	}



	public function update(Request $request , Role $role)
	{

		$this->validateForm($request);


		$role->update($request->only('name' , 'persian_name'));



		$role->refreshPermissions($request->permissions);


		return back()->with('success' ,true);
	}


	protected function validateForm(Request $request)
	{
		$request->validate([
			'name' => ['required'],
			'persian_name' => ['required']
		]);
	}




}
