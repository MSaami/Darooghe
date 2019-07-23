<?php

namespace App\Providers;

use App\Permission;
use App\Role;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class PermissionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Permission::all()->map(function($permission){
            Gate::define($permission->name , function($user) use($permission){
               return  $user->hasPermissionTo($permission);
            });
        });


        Blade::if('role', function($role){
            return auth()->check() && auth()->user()->hasRole($role);
        });
        Blade::if('admin', function(){
            $role = Role::find(1);
            return auth()->check() && auth()->user()->hasRole($role->name);
        });

    }
}
