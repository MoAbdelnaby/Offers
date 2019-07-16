@if (auth()->guard('admin')->user()->hasPermission('delete_admins'))
<!-- Trigger the modal with a button -->
<button type="button" class="btn  btn-danger" data-toggle="modal" data-target="#del_admin{{ $id }}"><i class="fa fa-trash"></i></button>
@else
<button type="button" class="btn disabled  btn-danger"><i class="fa fa-trash"></i></button>
@endif
<!-- Modal -->
<div id="del_admin{{ $id }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
      </div>
      {!! Form::open(['route'=>['admins.destroy', $id], 'method'=>'delete']) !!}
      <div class="modal-body">
        <p>{{ trans('admin.delete_this',['name'=>$first_name . ' '. $last_name]) }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">{{ trans('admin.close') }}</button>
              {!! Form::submit(trans('admin.yes'), ['class'=>'btn btn-danger']) !!}
      </div>
       {!! Form::close() !!}
    </div>

  </div>
</div>