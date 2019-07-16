
@extends('style.index')
@section('content')


  <!-- BREADCRUMB -->
  <div id="breadcrumb">
    <div class="container">
      <ul class="breadcrumb pull-left">
        <li><a href="#">Home</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Category</a></li>
        <li class="active">Product Name Goes Here</li>
      </ul>
    </div>
  </div>
  <!-- /BREADCRUMB -->

  <!-- section -->
  <div class="section">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        <!--  Product Details -->
        @foreach($adds as $add)

        <div class="product product-details clearfix">
          <div class="col-md-6">
            <div id="product-main-view">
              <div class="product-view">
                @if(!empty('image'))

                    <img  src="{{  Storage::url($add->image) }}" alt="product" />
                    @else 
                    <img  src="{{  Storage::url('userAdds/default.png') }}" alt="product" />
                    @endif
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-body">
              <div class="product-label">
                <span>{{ $add->created_at }}</span>
                <span class="sale"><span style="text-align: right;">الحالة </span>{{ $add->status }} </span>
              </div>
              <h2 class="product-name">{{ $add->add_name }}</h2>
              <h3 class="product-price">{{ $add->price }}</h3>
              <div>
                <div class="product-rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-o empty"></i>
                </div>
              </div>
              <p><strong>{{ $add->stock }}</strong> In Stock</p>
              <p>{{ $add->description_ar }}</p>
              
              <div class="product-btns">
                      <button  data-toggle="modal" data-target="#del_admin{{ $add->id }}" class="main-btn icon-btn"><i class="fa fa-trash"></i></button>
                      <form action="{{ url('admin/adds/'.$add->id) }}" method="post">
                       {{ csrf_field() }}
                        {{ method_field('put') }}
                       <input type="hidden" name="status" value="active" />
                      <button style="margin-top: 5px" type="submit" name="submit"  class="primary-btn"><i class="fa fa-link"></i> Activate</button>

                      </form>

                      <button style="margin-top: 10px" class="primary-btn"><i class="fa fa-user"></i> BY: {{ $add->user_id()->first()->name}} </button>
              </div>




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

              
            </div>
          </div>
          

        </div>
        <!-- /Product Details -->
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /section -->



          </div>
        </div>
      </div>










@endsection