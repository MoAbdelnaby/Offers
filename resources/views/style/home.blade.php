@extends('style.index')
@section('content')


	<!-- HOME -->
	<div id="home">
		<!-- container -->
		<div class="container">
			<!-- home wrap -->
			<div class="home-wrap">
				<!-- home slick -->
				<div id="home-slick">
				@foreach($offers as $offer)

					<!-- banner -->
					<div class="banner banner-1">
						@if(!empty('image'))

                    	<img  src="{{  Storage::url($offer->image) }}" alt="" />
                   		 @else 
                    	<img  src="{{  Storage::url('offers/default.png') }}" alt="" />
                    	@endif
						<div style="background: rgba(0,0,0,.7); padding: 20px" class="banner-caption">
							<h1 class="primary-color text-center">عرض مميز<br><span style="display:block;font-size:30px" class="text-center white-color font-weak">{{ $offer->offer_name_ar}}</span></h1>

							<a href="{{ url('offers/'.$offer->id) }}" class="primary-btn">عرض التفاصيل</a>
							<h3 style="padding-top: 13px; padding-bottom: 13px" class="primary-btn"><span style="text-align: right;"> السعر : </span> {{ $offer->price }} جنية</h3>

						</div>
					</div>
					<!-- /banner -->
				@endforeach
				</div>
				<!-- /home slick -->
			</div>
			<!-- /home wrap -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOME -->


	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section-title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">العروض الأخيرة</h2>
						<div class="pull-left">
							<div class="product-slick-dots-1 custom-dots"></div>
						</div>
					</div>
				</div>
				<!-- /section-title -->

				<!-- banner -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="banner banner-2">
						<img src="{{ url('design/style/img/banner14.jpg') }}" alt="">
						<div class="banner-caption">
							<h2 class="white-color">NEW<br>COLLECTION</h2>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
				</div>
				<!-- /banner -->

				<!-- Product Slick -->
				<div class="col-md-9 col-sm-6 col-xs-6">
						<div id="product-slick-1" class="product-slick">

 @if(count($adds) > 0)
          @foreach ($adds as $add)
           <!-- /Product Single -->
							<!-- Product Single -->
							<div class="product product-single">
								


                  <div class="product-thumb">
                    <div class="product-label">
                      <span>{{ $add->created_at }}</span>
                      <span class="sale"><span style="text-align: right;">جديد </span> </span>
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
                     <button class="primary-btn" style="padding-top: 13px; padding-bottom: 13px; margin-bottom: 3px" ><span style="text-align: right;"> أضيف بواسطة : </span> {{ $add->user_id()->first()->name }} </button>
                      <a href="{{ url('adds/'.$add->id) }}" class="primary-btn"><i class="fa fa-link"></i> عرض التفاصيل</a>
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
				<!-- /Product Slick -->
			</div>
			<!-- /row -->

			
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->



@endsection('content')