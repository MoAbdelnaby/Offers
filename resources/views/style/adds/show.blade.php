
@extends('style.index')
@section('content')

  @foreach($adds as $add)
  <!-- BREADCRUMB -->
  <div id="breadcrumb">
    <div class="container">
      <ul class="breadcrumb pull-left">
        <li><a href="{{ url('/')}}">Home</a></li>
        <li><a href="{{ url('category/'.$add->department_id  ) }}">{{$add->department_id()->first()->dep_name_ar}}</a></li>
        <li class="active">{{$add->add_name}}</li>
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
   <div class="col-md-4"></div>
   <div class="col-md-8">

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
                <span class="sale"><span style="text-align: right;">جديد </span> </span>
              </div>
              <h2 class="product-name">{{ $add->add_name }}</h2>
              <h3 style="padding-top: 13px; padding-bottom: 13px" class="product-price"><span style="text-align: right;"> السعر : </span> {{ $add->price }} جنية</h3>
              <div>
                <div class="product-rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-o empty"></i>
                </div>
              </div>
              <p>الكمية المتاحة  :<strong> {{ $add->stock }}</strong></p>
              <p>{!! $add->description_ar !!}</p>

              <div class="product-btns">
                      
                      <h3 class="primary-btn" style="padding-top: 13px; padding-bottom: 13px" ><span style="text-align: right;"> أضيف بواسطة : </span> {{ $add->user_id()->first()->name }} </h3>
              </div>
              
              
    @endforeach

       
          </div>
          

        </div>
        <!-- /Product Details -->
      </div>

      </div>
      
    </div>
<!-- /row -->
  </div>

    <!-- /container -->


</div>
  <!-- /section -->










@endsection