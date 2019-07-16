
@extends('style.index')
@section('content')


<!-- STORE -->
<div class="container-fluid">
  <h1 class="text-center" style="font-size: 38px; font-weight: bold; margin-top: 30px"> عروضي</h1>
          <div id="store">
            <!-- row -->
            <div class="row">
              <!-- Product Single -->
<div class="col-md-4"></div>
<div class="col-md-8">
  @if(count($adds) > 0)
          @foreach ($adds as $add)
           <!-- /Product Single -->
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="product product-single">
                  <div class="product-thumb">
                    <div class="product-label">
                      <span>{{ $add->created_at }}</span>
                      <span class="sale"><span style="text-align: right;">الحالة </span>{{ $add->status }} </span>
                    </div>
                    @if(!empty('image'))

                    <img  src="{{  Storage::url($add->image) }}" alt="" />
                    @else 
                    <img  src="{{  Storage::url('userAdds/default.png') }}" alt="" />
                    @endif
                  </div>
                  <div class="product-body">
                    <h3 class="product-price"><span style="text-align: right;"> السعر : </span> {{ $add->price }} جنية</h3>
                    <div class="product-rating">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-o empty"></i>
                    </div>
                    <h2 class="product-name"><a href="#">{{ $add->add_name }}</a></h2>
                    <div class="product-btns">
                      <a href="{{ route('adds.edit', $add->id) }}" class="main-btn icon-btn"><i class="fa fa-edit"></i></a>
                      <button  data-toggle="modal" data-target="#del_admin{{ $add->id }}" class="main-btn icon-btn"><i class="fa fa-trash"></i></button>
                      <a href="{{ url('adds/'.$add->id) }}" class="primary-btn"><i class="fa fa-link"></i> Show Item</a>
                    </div>
                  </div>
                </div>
              </div>
               <!-- /Product Single -->





<!-- Modal -->
<div id="del_admin{{ $add->id }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
      </div>
      {!! Form::open(['route'=>['adds.destroy', $add->id], 'method'=>'delete']) !!}
      <div class="modal-body">
        <p>{{ trans('admin.delete_this',['name'=>$add->add_name]) }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">{{ trans('admin.close') }}</button>
              {!! Form::submit(trans('admin.yes'), ['class'=>'btn btn-danger']) !!}
      </div>
       {!! Form::close() !!}
    </div>

  </div>
</div>

@endforeach
          
@else
<div class=" text-center alert alert-info"> ليس لديك أي عروض </div>
@endif
</div>

          </div>
        </div>
      </div>










@endsection