<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<div class="category-nav">
					<span class="category-header">Categories <i class="fa fa-list"></i></span>
					<ul class="category-list">

@foreach($deps as $item)
    @if($item->children->count() > 0)

             <li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">{{ $item->dep_name_ar }} <i class="fa fa-angle-left"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-12">
             <ul class="list-links">
                 @foreach($item->children as $submenu)
                     <li><a href="{{ url('category/'.$submenu->id ) }}">{{ $submenu->dep_name_ar }}</a></li>
                     
                  @endforeach
             </ul>
             <hr class="hidden-md hidden-lg">
   					 				</div>	
								</div>
						
						</div>
						</li>
    @elseif($item->children->count() === 0 && $item->parent === null)
        <li><a href="{{  url('category/'.$item->id) }}">{{ $item->dep_name_ar }}</a></li>
    @endif
@endforeach

					</ul>
				</div>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav pull-left">
					<span class="menu-header">Menu <i class="fa fa-bars pull-left"></i></span>
					<ul class="menu-list">
						<li><a href="{{ url('/') }}">Home</a></li>
						
						
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->
