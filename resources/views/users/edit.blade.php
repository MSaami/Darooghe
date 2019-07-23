@extends('layouts.app')
@section('links')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
@endsection
@section('content')
<div class="row justify-content-center">
	<div class="col-md-4 mt-5">
		@include('users.panel')
	</div>
	<div class="col-md-8 mt-5 ">
		@include('partials.alerts')
		<form method="post" action=" {{route('users.update' , $user->id)}} ">
			@csrf

			<div class="form-group ">
				<span> @lang('users.add role to user') </span>
				<hr>
			</div>
			<div class="form-group">
				@forelse($roles as $role)
				<div class="form-check form-check-inline">
					<div class="checkbox checkbox-primary">
					<input name="roles[]" class="form-check-input"  value=" {{$role->name}} " {{ $userRoles->contains($role->name) ? 'checked' : '' }}   type="checkbox" id=" {{'role' . $role->id}} " >
					<label class="form-check-label" for=" {{'role' . $role->id}} "> {{$role->persian_name}} </label>
					</div>
				</div>
				@empty
				<p>
					@lang('users.there is no roles')
				</p>
				@endforelse
			</div>
				<div class="form-group mt-5">
				<span> @lang('users.add permission to user') </span>
				<hr>
			</div>
			<div class="form-group">
				@forelse($permissions as $permission)
				<div class="form-check form-check-inline">
					<div class="checkbox checkbox-primary">
					<input class="form-check-input" name="permissions[]" {{$userPermissions->contains($permission->name) ? 'checked' : ''}}  value="{{$permission->name}}" type="checkbox" id=" {{$permission->id}} " >
					<label class="form-check-label" for=" {{$permission->id}} "> {{$permission->persian_name}} </label>
					</div>
				</div>
				@empty
				<p>
					@lang('users.there is no permissions')
				</p>
				@endforelse
			</div>
			<div class="form-group mt-5">
				<button class="btn btn-primary"> @lang('users.update') </button>
			</div>
		</form>
	</div>
</div>
@endsection