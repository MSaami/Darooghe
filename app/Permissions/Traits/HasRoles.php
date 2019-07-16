<?php

namespace App\Permissions\Traits;

use App\Role;

trait HasRoles
{
	public function hasRole(string $role)
	{
		return $this->roles->contains('name', $role);
	}


	public function roles()
	{
		return $this->belongsToMany(Role::class, 'users_roles');
	}


	public function giveRolesTo(...$roles)
	{
		$roles = $this->getAllRoles(array_flatten($roles));

		if($roles->isEmpty()) return $this;

		$this->roles()->syncWithoutDetaching($roles);

		return $this;

	}

	public function withdrawRolesTo(...$roles)
	{
		$roles = $this->getAllRoles(array_flatten($roles));

		$this->roles()->detach($roles);

		return $this;
	}


	private function getAllRoles(array $roles)
	{
		return Role::whereIn('name' , $roles)->get();
	}


	// TODO : Give Role to user
	// TODO : invoke Role from user

}