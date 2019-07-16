
@extends('style.index')
@section('content')

  @foreach($offers as $offer)
  <!-- BREADCRUMB -->
  <div id="breadcrumb">
    <div class="container">
      <ul class="breadcrumb pull-left">
        <li><a href="{{ url('/')}}">Home</a></li>
        <li><a href="{{ url('category/'.$offer->department_id  ) }}">{{$offer->department_id()->first()->dep_name_ar}}</a></li>
        <li class="active">{{$offer->offer_name_ar}}</li>
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

                    <img  src="{{  Storage::url($offer->image) }}" alt="product" />
                    @else 
                    <img  src="{{  Storage::url('offers/default.png') }}" alt="product" />
                    @endif
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-body">
              <div class="product-label">
                <span>{{ $offer->created_at }}</span>
                <span class="sale"><span style="text-align: right;">الحالة </span>{{ $offer->status }} </span>
              </div>
              <h2 class="product-name">{{ $offer->offer_name_ar }}</h2>
              <h3 style="padding-top: 13px; padding-bottom: 13px" class="product-price"><span style="text-align: right;"> السعر : </span> {{ $offer->price }} جنية</h3>
              <div>
                <div class="product-rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-o empty"></i>
                </div>
              </div>
              <p>الكمية المتاحة  :<strong> {{ $offer->stock }}</strong></p>
              <p>{!! $offer->description_ar !!}</p>
              
              
    @endforeach

              
            </div>
          </div>
          

        </div>
        <!-- /Product Details -->
      </div>
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /section -->





@endsection