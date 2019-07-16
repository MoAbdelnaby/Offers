
@extends('style.index')
@section('content')


<!-- STORE -->
<div class="container-fluid">
  <h1 class="text-center" style="font-size: 38px; font-weight: bold; margin-top: 30px"> {{ $department }}</h1>
          <div id="store">


             <div class="row">
              <!-- Product Single -->
<div class="col-md-4"></div>
<div class="col-md-8">
          @foreach ($stars as $star)
           <!-- /Product Single -->
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="product product-single">
                  <div class="product-thumb">
                    <div class="product-label">
                      <span>{{ $star->created_at }}</span>
                      <span class="sale"><span style="text-align: right;">الحالة </span>{{ $star->status }} </span>
                    </div>
                    @if(!empty('image'))

                    <img  src="{{  Storage::url($star->image) }}" alt="" />
                    @else 
                    <img  src="{{  Storage::url('userAdds/default.png') }}" alt="" />
                    @endif
                  </div>
                  <div class="product-body">
                    <h3 class="product-price"><span style="text-align: right;"> السعر : </span> {{ $star->price }} جنية</h3>
                    <div class="product-rating">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-o empty"></i>
                    </div>
                    <h2 class="product-name"><a href="#">{{ $star->add_name }}</a></h2>
                    <div class="product-btns">
                     <button class="primary-btn" style="padding-top: 13px; padding-bottom: 13px; margin-bottom: 3px" ><span style="text-align: right;"> أضيف بواسطة : </span> Admin </button>
                      <a href="{{ url('adds/'.$star->id) }}" class="primary-btn"><i class="fa fa-link"></i> عرض التفاصيل</a>
                    </div>
                  </div>
                </div>
              </div>
               <!-- /Product Single -->


@endforeach
          
</div>

          </div>



            <!-- row -->
            <div class="row">
              <!-- Product Single -->
<div class="col-md-4"></div>
<div class="col-md-8">
  @if(count($offers) > 0)
          @foreach ($offers as $offer)
           <!-- /Product Single -->
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="product product-single">
                  <div class="product-thumb">
                    <div class="product-label">
                      <span>{{ $offer->created_at }}</span>
                      <span class="sale"><span style="text-align: right;">الحالة </span>{{ $offer->status }} </span>
                    </div>
                    @if(!empty('image'))

                    <img  src="{{  Storage::url($offer->image) }}" alt="" />
                    @else 
                    <img  src="{{  Storage::url('userAdds/default.png') }}" alt="" />
                    @endif
                  </div>
                  <div class="product-body">
                    <h3 class="product-price"><span style="text-align: right;"> السعر : </span> {{ $offer->price }} جنية</h3>
                    <div class="product-rating">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-o empty"></i>
                    </div>
                    <h2 class="product-name"><a href="#">{{ $offer->add_name }}</a></h2>
                    <div class="product-btns">
                     <button class="primary-btn" style="padding-top: 13px; padding-bottom: 13px; margin-bottom: 3px" ><span style="text-align: right;"> أضيف بواسطة : </span> {{ $offer->user_id()->first()->name }} </button>
                      <a href="{{ url('adds/'.$offer->id) }}" class="primary-btn"><i class="fa fa-link"></i> عرض التفاصيل</a>
                    </div>
                  </div>
                </div>
              </div>
               <!-- /Product Single -->


@endforeach
          
@else
<div class=" text-center alert alert-info"> ليس لديك أي عروض </div>
@endif
</div>

          </div>
 <!-- row -->
           

        </div>
      </div>



@endsection