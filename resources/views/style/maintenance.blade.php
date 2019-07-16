@include('style.layouts.header')
@include('style.layouts.navbar')

<div class="container">
<h1 style="margin-top: 20px" class="text-center alert alert-info">
{!! setting()->message_maintenance !!}
	
</h1>
</div>
@include('style.layouts.footer')