@extends('layouts.app')
@section('title' , __('users.list'))
@section('content')
<div class="row justify-content-center">
	<div class="col-md-4 mt-5">
		@include('users.panel')
	</div>
	<div class="col-md-8 mt-5">
		<div class="card">
			<div class="card-header">
				@lang('users.list')
			</div>
			<div class="card-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">@lang('users.name')</th>
							<th scope="col">@lang('users.email')</th>
							<th scope="col">@lang('users.roles')</th>
							<th scope="col">@lang('users.operator')</th>
						</tr>
					</thead>
					<tbody>
						@forelse($users as $user)
						<tr>
							<td>{{$user->name}}</td>
							<td> {{$user->email}} </td>
							<td>
								@foreach($user->roles as $role)
								<span class="badge badge-secondary"> {{$role->persian_name}} </span>
								@endforeach
							<td> <a href=" {{route('users.edit' , $user->id)}} "> @lang('users.edit') </a> </td>
						</tr>
						@empty
						<tr>
							@lang('users.there is no user')
						</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection