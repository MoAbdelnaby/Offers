@extends('admin.index')

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

<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{$title}} </h3>
</div> 
<div class="box-body">

{!! Form::open(['url'=>aurl('offers'),'files'=>true ]) !!}

<div class="form-group">
  
  {!! Form::label('offer_name_ar',trans('admin.offer_name_ar')) !!}
  {!! Form::text('offer_name_ar',old('offer_name_ar'),['class'=>'form-control']) !!}
</div>

<div class="form-group">
  
  {!! Form::label('offer_name_en',trans('admin.offer_name_en')) !!}
  {!! Form::text('offer_name_en',old('offer_name_en'),['class'=>'form-control']) !!}
</div>

<div class="form-group">
    <label>@lang('admin.description_ar')</label>
    <textarea name="description_ar" class="form-control ckeditor">{{ old('description_ar') }}</textarea>
</div>

<div class="form-group">
    <label>@lang('admin.description_en')</label>
    <textarea name="description_en" class="form-control ckeditor">{{ old('description_en') }}</textarea>
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

{!! Form::close() !!}

</div> 
</div>






@endsection
