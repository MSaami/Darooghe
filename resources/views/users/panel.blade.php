<div class="card" style="width: 18rem;">
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><a href=" {{route('users.index')}} ">@lang('users.show users')</a></li>
    <li class="list-group-item"><a href=" {{route('roles.index')}} ">@lang('users.show roles')</a></li>
    <li class="list-group-item"> <a href=" {{route('permissions.index')}} "> @lang('users.add permission') </a> </li>
  </ul>
</div>