@if(count($errors->all()) > 0)

<div class="col-md-offset-4 col-md-4 alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>

@endif


@if(session()->has('success'))
<div class="col-md-offset-4 col-md-4 alert alert-success">
	
	<h2>{{ session('success')  }}</h2>
</div>

@endif

@if(session()->has('error'))
<div class=" col-md-offset-4 col-md-4 alert alert-danger">
	
	<h2>{{ session('error')  }}</h2>
</div>

@endif