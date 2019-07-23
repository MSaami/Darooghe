<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
	public function index(Request $request)
	{
		$permissions = Permission::all();
		return view('users.permissions' , compact('permissions'));
	}


	public function edit(Request $request , Permission $permission)
	{

		return view('users.edit-permission' , compact('permission'));
	}


	public function update(Request $request , Permission $permission)
	{
		$this->validateForm($request);

		$permission->update($request->only('name' , 'persian_name'));

		return back()->with('success' , true);
	}


	public function store(Request $request)
	{
		$this->validateForm($request);

		Permission::create($request->only('name' , 'persian_name'));

		return back()->with('success' , true);
	}


	protected function validateForm(Request $request)
	{
		$request->validate([
			'name' => ['required'],
			'persian_name' => ['required']
		]);
	}


}
