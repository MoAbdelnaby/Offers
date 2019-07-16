

@extends('style.index')
@section('content')


<div class="container">
	<h1 style="margin:35px 0" class="text-center"> تعديل الحساب الشخصي</h1>
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
<div class="box">
  <div class="box-header">
    <h3 class="box-title"> </h3>
</div> 
<div class="box-body">


<!-- {!! Form::open(['url'=>'profile/'.$user->id, 'method'=>'put','files'=>true  ]) !!}   -->
<form action="{{ url('profile/'.$user->id) }}" method="post" enctype="multipart/form-data">
 {{ csrf_field() }}
 {{ method_field('put') }}
 
<div class="form-group">
  
  {!! Form::label('name',trans('admin.name')) !!}
  {!! Form::text('name',$user->name,['class'=>'form-control']) !!}
</div>

<div class="form-group">
  
  {!! Form::label('email',trans('admin.email')) !!}
  {!! Form::email('email',$user->email,['class'=>'form-control']) !!}
</div>

<div class="form-group">
  
  {!! Form::label('password',trans('admin.password')) !!}
  {!! Form::password('password',['class'=>'form-control']) !!}
</div>

<div class="form-group">
  
  {!! Form::label('level',trans('admin.level')) !!}
  {!! Form::select ('level',['user'=>trans('admin.user'),'vendor'=>trans('admin.vendor'),'company'=>trans('admin.company')], $user->level,['class'=>'form-control', 'placeholder'=>'......']) !!}
</div>

<div class="form-group ">

  {!! Form::label('image','الصوره الشخصية') !!}
  {!! Form::file('image',['class'=>'form-control']) !!}

   @if(!empty('image'))

  <img class="img-thumbnail center-block" src="{{  Storage::url($user->image) }}" style="margin-top: 10px; width: 75px; height: 75px" />
  @else 
  <img class="img-thumbnail center-block" src="{{  Storage::url('users/default.png') }}" style="margin-top: 10px; width: 75px; height: 75px" />
  @endif

</div>


  {!! Form::submit(trans('admin.edit'),['class'=>'btn btn-primary form-control']) !!}

<!-- {!! Form::close() !!} -->
</form>

</div> 
</div>

</div>
</div>
</div>


@endsection('content')