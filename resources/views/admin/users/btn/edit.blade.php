@if (auth()->guard('admin')->user()->hasPermission('update_users'))
<a href="{{ aurl('users/'.$id.'/edit') }}" class="btn btn-info  center-block"><i class="fa fa-edit"></i></a>
@else
<a href="" class="btn btn-info disabled  center-block"><i class="fa fa-edit"></i></a>
@endif