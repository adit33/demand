<div class="form-group {!! $errors->has('nama_role') ? 'has-error' : '' !!}">
  {!! Form::label('nama_role', 'Nama role') !!}
  {!! Form::text('nama_role',null,['class'=>'form-control']) !!}
  {!! $errors->first('nama_role', '<p class="help-block">:message</p>') !!}
</div>

@if(isset($permission_role))

<div class="form-group">
@foreach($permissions  as $permission)
	<?php $checked = in_array($permission->id, $permission_role->pluck('id')->toArray()); ?>
	{!! Form::checkbox('nama_permission[]',$permission->nama_permission,$checked) !!}{!! $permission->nama_permission !!}<br>
@endforeach
</div>

@else
<div class="form-group">
	  @foreach($permissions as $permission)
	  <input type="checkbox" name="nama_permission[]" value="{!! $permission->nama_permission !!}">{!! $permission->nama_permission !!}</input><br>
	  @endforeach
</div>

@endif

{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}
