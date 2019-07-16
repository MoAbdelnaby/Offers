@extends('admin.index')

@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{$title}} </h3>
</div> 
<div class="box-body">


                    <form action="{{ route('admins.update', $admin->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="form-group">
                            <label>@lang('admin.first_name')</label>
                            <input type="text" name="first_name" class="form-control" value="{{ $admin->first_name }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('admin.last_name')</label>
                            <input type="text" name="last_name" class="form-control" value="{{ $admin->last_name }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('admin.email')</label>
                            <input type="email" name="email" class="form-control" value="{{ $admin->email }}">
                        </div>



                        <div class="form-group">
                            <label>@lang('admin.permissions')</label>
                            <div class="nav-tabs-custom">

                                @php
                                    $models = ['admins','users','departments', 'offers'];
                                    $maps = ['create', 'read', 'update', 'delete'];
                                @endphp

                                <ul class="nav nav-tabs">
                                    @foreach ($models as $index=>$model)
                                        <li class="{{ $index == 0 ? 'active' : '' }}"><a href="#{{ $model }}" data-toggle="tab">@lang('admin.' . $model)</a></li>
                                    @endforeach
                                </ul>

                                <div class="tab-content">

                                    @foreach ($models as $index=>$model)

                                        <div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="{{ $model }}">

                                            @foreach ($maps as $map)
                                                {{--create_users--}}
                                                <label><input type="checkbox" name="permissions[]" {{ $admin->hasPermission($map . '_' . $model) ? 'checked' : '' }} value="{{ $map . '_' . $model }}"> @lang('admin.' . $map)</label>
                                            @endforeach

                                        </div>

                                    @endforeach

                                </div><!-- end of tab content -->

                            </div><!-- end of nav tabs -->

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('admin.edit')</button>
                        </div>

                    </form><!-- end of form -->


</div> 
</div>






@endsection
