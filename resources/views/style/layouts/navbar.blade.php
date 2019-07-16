
	<header>
		<!-- top Header -->
		<div id="top-header">
			<div class="container">
				<div class="pull-right">
					<span>مرحبا بكم في موقع عروض الرحاب !</span>
				</div>
				<div class="pull-left">
					<div id="time"></div>
				</div>
			</div>
		</div>
		<!-- /top Header -->

		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-right">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="{{ url('/') }}">
							<img src="{{ url('public/design/style/img/logo.png') }}" alt="">
						</a>
					</div>
					<!-- /Logo -->

					
				</div>
				<div class="pull-left">
					<ul class="header-btns">
						<!-- Account -->
						<li class="header-account dropdown default-dropdown">
							<a href="{{ route('profile.index') }}">
								<i class=" fa-2x fa fa-user-o"></i></a>

						 @guest
                          
                                <!-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> -->
                                <a href="{{ route('login') }}" class="text-uppercase">Login</a> /
                          
                            @if (Route::has('register'))
                               
                                    <!-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> -->
                                    <a href="{{ route('register') }}" class="text-uppercase">Join</a>
                              
                            @endif

                             @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><strong>
                                    {{ Auth::user()->name }}</strong> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-left " aria-labelledby="navbarDropdown">
                                	<a style="display: block;"  class="text-center" href="{{ route('profile.index') }}">الحساب الشخصي </a>
                                    <a style="display: block;" class="dropdown-item text-center " href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('تسجيل الخروج') }}
                                    </a>



                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                            
							<!-- <ul class="custom-menu">
								<li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
								<li><a href="#"><i class="fa fa-heart-o"></i> My Wishlist</a></li>
								<li><a href="#"><i class="fa fa-exchange"></i> Compare</a></li>
								<li><a href="#"><i class="fa fa-check"></i> Checkout</a></li>
								<li><a href="#"><i class="fa fa-unlock-alt"></i> Login</a></li>
								<li><a href="#"><i class="fa fa-user-plus"></i> Create An Account</a></li>
							</ul> -->
						</li>
						<!-- /Account -->


						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class=""></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER