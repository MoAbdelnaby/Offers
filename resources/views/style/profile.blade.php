@extends('style.index')
@section('content')


<div class="container">
  <h1 style="margin:35px 0" class="text-center">  Account </h1>
  <div class="row">



    <div class=" col-md-4 col-md-push-4">


<div class="panel panel-default text-right">
                    <div class="panel-heading">
                     <i class="text-left fa fa-id-card-o"></i>
                       <span class="pull-left toggle-info">
                         Public Info
                       </span> 
                    </div>
                    <div class="panel-body">
                      
                            
                           <div class="comment-box">
                                <p class='member-c'>{{ $user->name }}</p>
                                <span class='member-n'> الأسم</span>
                           </div>

                           <div class="comment-box">
                                <p class='member-c'>{{ $user->email }}</p>
                                <span class='member-n'>الإيميل</span>
                           </div>

                            <div class="comment-box">
                                <p class='member-c'>{{ $user->level }}</p>
                                <span class='member-n'>مستوي العضوية</span>
                           </div>
                       
                    </div>
                </div>





</div>

    <div class="col-md-4 col-md-push-4">
      <div class="form-group ">
      <h3 class="text-center"> الصوره الشخصية</h3>
         @if(!empty('image'))

        <img class="img-thumbnail center-block" src="{{  Storage::url($user->image) }}" style="margin-top: 10px; width: 75px; height: 75px" />
        @else 
        <img class="img-thumbnail center-block" src="{{  Storage::url('users/default.png') }}" style="margin-top: 10px; width: 75px; height: 75px" />
        @endif



    </div>
    </div>
    <div class="col-md-offset-4 col-md-2 col-md-push-1">
      <a href="{{ route('profile.edit', $user->id) }}" class=" center-block btn btn-info btn-sm"><i class="fa fa-edit"></i> تعديل الحساب</a>
      <a href="{{ url('adds') }}" class=" center-block btn btn-info btn-sm"><i class="fa fa-th"></i> عروضي</a>
      <a href="{{ route('adds.create') }}" class=" center-block btn btn-info btn-sm"><i class="fa fa-plus"></i> إضافة عرض</a>
    </div>

</div>
</div>


@endsection('content')

