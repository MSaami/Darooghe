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
				@lang('users.edit permission')
			</div>
			<div class="card-body">
				<form method="post" action=" {{route('permission.update' , $permission->id)}} ">
					@csrf
					<div class="form-row">
						<div class="col">
							<input type="text" name="name" value="{{$permission->name}}" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}} " placeholder=" @lang('users.role name') ">
							@if($errors->has('name'))
							<small class="form-text text-danger"> {{$errors->first('name')}} </small>
							@endif
						</div>
						<div class="col">
							<input type="text" value="{{$permission->persian_name}}"  name="persian_name" class="form-control {{$errors->has('persian_name') ? 'is-invalid' : ''}}" placeholder=" @lang('users.role persian name') ">
							@if($errors->has('persian_name'))
							<small class="form-text text-danger"> {{$errors->first('persian_name')}} </small>
							@endif
						</div>
						<div class="col">
							<button class="btn btn-primary">
								@lang('users.update')
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection