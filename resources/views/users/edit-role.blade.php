@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
	<div class="col-md-4 mt-5">
		@include('users.panel')
	</div>
	<div class="col-md-8 mt-5">
		@include('partials.alerts')
		<div class="card">
			<div class="card-header">
				@lang('users.edit role')
			</div>
			<div class="card-body">
				<form method="post" action="{{route('roles.update' , $role->id)}}">
					@csrf
					<div class="form-row">
						<div class="col">
							<input type="text" name="name" value="{{$role->name}}" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}} " placeholder=" @lang('users.role name') ">
							@if($errors->has('name'))
							<small class="form-text text-danger"> {{$errors->first('name')}} </small>
							@endif
						</div>
						<div class="col">
							<input type="text" value="{{$role->persian_name}}"  name="persian_name" class="form-control {{$errors->has('persian_name') ? 'is-invalid' : ''}}" placeholder=" @lang('users.role persian name') ">
							@if($errors->has('persian_name'))
							<small class="form-text text-danger"> {{$errors->first('persian_name')}} </small>
							@endif
						</div>
					</div>
					<div class="form-group mt-5">
						<span>
							@lang('users.add permission to role')
						</span>
						<hr>
					</div>
					<div class="form-group">
						@forelse($permissions as $permission)
						<div class="custom-control custom-checkbox custom-control-inline">
							<input type="checkbox" name='permissions[]' {{ $role->permissions->contains($permission) ? 'checked' : '' }} value="{{$permission->name}}" class="custom-control-input" id="{{'per'.$permission->id}}">
							<label class="custom-control-label" for="{{'per'.$permission->id}}">{{$permission->persian_name}}</label>
						</div>
						@empty
						<p>
							@lang('users.there is no permissions')
						</p>
						@endforelse
					</div>
					<div class="form-group">
						<button class="btn btn-primary">@lang('users.edit')</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection