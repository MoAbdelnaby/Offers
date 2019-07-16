
@extends('style.index')
@section('content')

@push('js')
<script type="text/javascript">
  $(document).ready(function() {

      $('#jstree').jstree({
        "core" : {
          'data' : {!! load_dep(old('department_id'))  !!},
          "themes" : {
            "variant" : "large"
          }
        },
        "checkbox" : {
          "keep_selected_style" : false
        },
        "plugins" : [ "wholerow"]
      });

  });

   $('#jstree').on('changed.jstree', function(e,data) {
    var i , j , r = [];
    for(i = 0, j = data.selected.length; i < j; i++)
    {
      r.push(data.instance.get_node(data.selected[i]).id);
    }
    $('.department_id').val(r.join(', '));

  });

    CKEDITOR.config.language =  "{{ app()->getLocale() }}";

</script>
@endpush
<div class="container">
  <div class="row">
    <div class="col-md-offset-4 col-md-4">
<div class="box">
  <div class="box-header">
    <h1 style="text-align: center; font-size: 38px; margin-top: 20px">{{ $title }} </h1>
</div> 
<div class="box-body">

<form action="{{ route('adds.store') }}" method="post" enctype="multipart/form-data">

{{ csrf_field() }}
{{ method_field('post') }}

<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
<input type="hidden" name="status" value="pending">

<div class="form-group">
  
  {!! Form::label('add_name',trans('admin.add_name')) !!}
  {!! Form::text('add_name',old('add_name'),['class'=>'form-control']) !!}
</div>


<div class="form-group">
    <label>@lang('admin.description_ar')</label>
    <textarea name="description_ar" class="form-control ckeditor">{{ old('description_ar') }}</textarea>
</div>


<div class="clearfix"></div>
{!! Form::label('departments',trans('admin.departments')) !!}
<div id="jstree"></div>
<input type="hidden" class="department_id" name="department_id" >

<div class="clearfix"></div>

 <div class="form-group">
    <label>@lang('admin.price')</label>
    <input type="number" name="price" class="form-control" value="{{ old('price') }}">
</div>

<div class="form-group">
    <label>@lang('admin.stock')</label>
    <input type="number" name="stock" class="form-control" value="{{ old('stock') }}">
</div>


<div class="form-group">
  
  {!! Form::label('image',trans('admin.offer_image')) !!}
  {!! Form::file('image',['class'=>'form-control']) !!}
</div>



{!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary form-control']) !!}

</form>

</div> 
</div>


</div>
</div>
</div>




@endsection
