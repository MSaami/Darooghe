<?php

namespace App;

use App\Permissions\Traits\HasPermissions;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	use HasPermissions;

	protected $fillable = ['name' , 'persian_name'];


	public function permissions()
	{
		return $this->belongsToMany(Permission::class , 'roles_permissions');
	}
}
