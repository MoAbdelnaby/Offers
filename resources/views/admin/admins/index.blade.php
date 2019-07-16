@extends('admin.index')

@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title"> </h3>
</div> 
<div class="box-body">
 @if (auth()->guard('admin')->user()->hasPermission('delete_admins'))

{!! Form::open(['id'=>'form_data','url'=>aurl('admins/destroy/all'), 'method'=>'delete']) !!}
@endif

  {!! $dataTable->table([
    'class'=>'dataTable table table-responsive table-striped table-sm table-hover table-bordered'
    ],true) !!}


{!! Form::close() !!}

</div> 
</div>


<!-- Modal -->
<div id="multipleDelete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger">
          <div class="empty_record hidden">
            <h4>{{ trans('admin.please_check_some_records') }} </h4>
          </div>
          <div class="not_empty_record hidden">
            <h4>{{ trans('admin.ask_delete_item') }}  <span class="record_count"></span>?</h4>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="not_empty_record hidden">
           <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.no') }}</button>
           <input type="submit" name="delall" class="del_all btn btn-danger"  value="{{trans('admin.yes')}}"  />
        </div>
        <div class="empty_record hidden">
           <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.close') }}</button>
        </div>
      </div>
    </div>

  </div>
</div>

@push('js')
<script type="text/javascript">
  delete_all();
</script>
{!! $dataTable->scripts() !!}
@endpush

@endsection
