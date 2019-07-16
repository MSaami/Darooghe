<?php

namespace App\Permissions\Traits;

use App\{Role, Permission};

trait HasPermissions
{

	public function hasPermissionTo(Permission $permission)
	{
		return $this->hasPermissionThroughRole($permission)
		 || $this->hasPermission($permission);
	}



	public function givePermissionsTo(...$permissions)
	{
		$permissions = $this->getAllPermissions(array_flatten($permissions));

		if ($permissions->isEmpty()) return $this;

		 $this->permissions()->syncWithoutDetaching($permissions);

		return $this ;
	}


	public function invokePermissionsFrom(...$permissions)
	{
		$permissions = $this->getAllPermissions(array_flatten($permissions));

		$this->permissions()->detach($permissions);

		return $this ;
	}


	public function refreshPermissions(...$permissions)
	{
		$permissions = $this->getAllPermissions(array_flatten($permissions));

		$this->permissions()->detach();

		$this->permissions()->saveMany($permissions);

		return $this;
	}


	protected function getAllPermissions(array $permissions)
	{
		return Permission::whereIn('name' , $permissions)->get();
	}


	protected function hasPermissionThroughRole(Permission $permission)
	{
		foreach ($permission->roles as $role) {
			if($this->roles->contains($role))
			{
				return true;
			}
		}
		return false ;

	}


	protected function hasPermission($permission)
	{
		return $this->permissions->contains('name', $permission->name);
	}





	public function permissions()
	{
		return $this->belongsToMany(Permission::class, 'users_permissions');
	}
}
